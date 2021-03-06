<?php

class AgendaActivite extends CI_Controller{


    public function index()
    {
        $this->load->view('gestionActiviteIndex');
    }

    public function gestion(){
  
        $this->load->helper("Date_helper");
        $semaines = week2period(date("Y"), date("W"));
        $this->load->model("Agenda");
        $x=Agenda::getAll();
        $data['listAgenda']= $x;
        $tab=[];
        foreach($x as $y){ // Pour chaque ligne de la table agenda
            $z=true;
            $date=date('d-m-Y', strtotime($y->dateDebutActivite()));
            $dateFin=date('d-m-Y', strtotime($y->dateFinActivite()));
            while($z==true){  /// tant que les deux dates ne sont pas égales
                if($date==$dateFin){
                    $z=false;
                }
                $p=new \DateTime($date);
                if($p->format('N')==$y->jour())
                    $tab[]=str_replace('-','',$date).substr(($y->horaireDebutActivite()),0, 2) . substr(($y->horaireFinActivite()),0, 2); //date sous format 311220160809 -> 31-12-2016-08h-09h
                //jddayofweek(gregoriantojd($mois,$jour,$annee));
                $date=date('d-m-Y', strtotime($date. ' + 1 days'));     // On incrémente le jour
            }
//            $tab[]=$date;
//            $date=date('d-m-Y', strtotime($date. ' + 1 days'));
//            $tab[]=$date;
//            $tab[]=$dateFin;
        }
        $data['semaines'] = $semaines;
        $data['test']=$tab;
        $this->load->view("gestionAgendaActivite",$data);
    }

    public function insert($param){
        switch($_SERVER['REQUEST_METHOD']){
            case 'GET' :
                if(isset($_SESSION['user'])){
                    $this->load->model("Activite");
                    $jour = substr($param, 0, 2);
                    $mois = substr($param, 2, 2);
                    $annee = substr($param, 4, 4);
                    $heureDebut = substr($param, 8, 2)[0] == '0' ? substr($param, 9, 1).'h' : substr($param, 8, 2).'h';
                    $heureFin = substr($param, 10, 2)[0] == '0' ? substr($param, 11, 1).'h' : substr($param, 10, 2).'h';
                    
                    $activites = Activite::getAll();
                    $date = new \DateTime($annee.'-'.$mois.'-'.$jour); 
                    setlocale (LC_TIME, 'fr_FR.utf8','fra');
                    $titre = ucfirst(strftime("%A", $date->getTimestamp())).' '. $date->format('d').' '. ucfirst(strftime("%B", $date->getTimestamp())). ' - '.$heureDebut.'-'.$heureFin;
                    $data['titre'] = $titre;
                    $data["hidden"] = $date->format('Y-m-d').'|'.$heureDebut.':'.$heureFin;
                    $data['activites'] = $activites;
                    $this->load->view("ajoutActiviteAgenda", $data);
                }else{
                    $_SESSION['messagee'] = "Erreur, accès refusé";
                    header('Location: ' . BASEURL);
                    exit();
                }
                break;
            case 'POST' :
                if(isset($_SESSION['user']) && isset($_POST['redondance']) && $_POST['redondance'] != null){
                    $this->load->model("Agenda");
                    $dateHeure = preg_split('/[|]/', $_POST['dateDebut']);
                    $dateDebut = new \DateTime($dateHeure[0].'00:00:01');
                    $redondance = $_POST['redondance'];
                    $dateFin = date_modify(new \DateTime($dateHeure[0].'23:59:59'), "+ ".$redondance.' week');
                    $hDebut = preg_split('/[:]/', $dateHeure[1])[0];
                    $heureMinuteSecondeDebut = preg_split('/h/', $hDebut);
                    $hFin = preg_split('/[:]/', $dateHeure[1])[1];
                    $heureMinuteSecondeFin = preg_split('/h/', $hFin);
                    $heureDebut = $heureMinuteSecondeDebut[1] != "" ? $heureMinuteSecondeDebut[0].':'.$heureMinuteSecondeDebut[1].':00'
                                                                        : $heureMinuteSecondeDebut[0].':00:00';
                    $heureFin = $heureMinuteSecondeFin[1] != "" ? $heureMinuteSecondeFin[0].':'.$heureMinuteSecondeFin[1].':00'
                                                                        : $heureMinuteSecondeFin[0].':00:00';
                    $idActivite = $_POST['activite'];
                    $jour = $dateDebut->format('N');
                    $ajoutActivite = new Agenda(null,$idActivite, $dateDebut->format("Y-m-d H:i:s"), $dateFin->format("Y-m-d H:i:s"), $jour, $heureDebut, $heureFin);
                    $ajoutActivite->create();
                    header('Location: '. base_url().'/index.php/agendaActivite/gestion');
                    exit();
                }
                
                
                break;
        }
    }
}