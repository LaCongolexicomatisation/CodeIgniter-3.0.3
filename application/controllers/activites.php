<?php

class activites extends CI_Controller{


    public function index()
    {
        $this->load->view('gestionActiviteIndex');
    }

    public function gestionActivites()
    {
        $this->load->model("Activite");
        $this->load->model("Theme");
        $data["listActivite"] = Activite::getAll();
        $this->load->view('gestionActivites',$data);
    }

    public function ajoutActivite(){
        $this->load->model("Theme");
        $this->load->model("Activite");
        switch($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $data['themes'] = Theme::getAll();
                $this->load->view("ajoutActivite",$data);
                break;
            case 'POST':
                if($_POST['idTheme']==-1) { // Theme inexistant
                    if (Theme::exist($_POST['nomTheme'])) { // rediriger sur la page du formulaire
                        $_SESSION["messagee"]="Le theme existe déja";
                        header("Location:".base_url()."index.php/activites/gestionActivites");
                        exit;
                        break;
                    }
                    else{ // créer le theme puis l'activite
                        $id=Theme::create($_POST['nomTheme']);
                        $x=Activite::create($_POST['nomActivite'],$_POST['descriptionActivite'],$id);
                        $_SESSION["messagee"]="Insertion effectuée avec succès";
                        header("Location:".base_url()."index.php/activites/gestionActivites");
                        exit;
                        break;
                        }
                }else { // Theme existe
                    Activite::create($_POST['nomActivite'],$_POST['descriptionActivite'],$_POST['idTheme']);
                    $_SESSION["messagee"]="Insertion effectuée avec succès";
                    header("Location:".base_url()."index.php/activites/gestionActivites");
                    exit;
                    break;
                }
        }
    }

    public function modifierActivite(){
        $this->load->model("Theme");
        $this->load->model("Activite");
        switch($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $data['themes'] = Theme::getAll();
                $data['activite']= Activite::get($_GET["id"]);
                $this->load->view("modifierActivite",$data);
                break;
            case 'POST':
                $x=Activite::save($_POST['idActivite'],$_POST['nomActivite'],$_POST['descriptionActivite'],$_POST['idTheme']);
                header("Location:".base_url()."index.php/activites/gestionActivites");
                exit;
                break;
        }
    }

    public function suppActivite(){
        $this->load->model("Activite");
        Activite::delete($_POST['idSuppActivite']);
    }

    public function gestionAgendaActivite(){
        $this->load->model("Activite");
        $this->load->model("Agenda");
        $data['listAgenda']= Agenda::getAll();
        $this->load->view("gestionAgendaActivite",$data);
    }
    public function gestionThemes(){
        $this->load->model("Theme");
        $data['themes'] = Theme::getAll();
        $this->load->view("gestionThemes",$data);
    }
    public function ajoutTheme(){

    }
    public function modifierTheme(){

    }
}