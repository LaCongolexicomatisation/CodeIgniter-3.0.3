<?php

/**
 * Created by PhpStorm.
 * User: labai
 * Date: 03/02/2016
 * Time: 17:28
 */
class enfantClient extends CI_Controller
{
    public function index(){
        $this->load->model('Enfant');
        $this->load->model('Utilisateur');
        $data['enfants']=Enfant::getEnfantByUser(Utilisateur::getByLogin($_SESSION['user']['login'])->id());
        $this->load->view('informationsEnfant',$data);
    }

    public function emploiDuTemps($id){
        $this->load->helper("Date_helper");
        $semaines = week2period(date("Y"), date("W"));
        $this->load->model("Agenda");
        $x=Agenda::getById($id);
        $data['listAgenda']= $x;
        $tab=[];
        foreach($x as $y){
            $z=true;
            $date=date('d-m-Y', strtotime($y->dateDebutActivite()));
            $dateFin=date('d-m-Y', strtotime($y->dateFinActivite()));
            while($z==true){
                if($date==$dateFin){
                    $z=false;
                }
                $p=new \DateTime($date);
                if($p->format('N')==$y->jour())
                    $tab[]=str_replace('-','',$date).substr(($y->horaireDebutActivite()),0, 2) . substr(($y->horaireFinActivite()),0, 2);
                //jddayofweek(gregoriantojd($mois,$jour,$annee));
                $date=date('d-m-Y', strtotime($date. ' + 1 days'));
            }
//            $tab[]=$date;
//            $date=date('d-m-Y', strtotime($date. ' + 1 days'));
//            $tab[]=$date;
//            $tab[]=$dateFin;
        }
        $data['semaines'] = $semaines;
        $data['test']=$tab;
        $this->load->view("gestionInscription enfant",$data);
    }
}