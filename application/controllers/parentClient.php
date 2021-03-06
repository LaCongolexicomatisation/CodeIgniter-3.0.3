<?php

class parentClient extends CI_Controller
{
    public function index(){
        $this->load->model('Utilisateur');
        $user=Utilisateur::getByLogin($_SESSION['user']['login']);
        $data['user']['nom'] = $user->nom();
        $data['user']['prenom'] = $user->prenom();
        $data['user']['adresseMail'] = $user->mail();
        $data['user']['telephone'] = $user->telephone();
        $data['user']['ville'] = $user->idVille();
        $this->load->view('informationsParent',$data);
    }

    public function inscriptionActivite(){
        $this->load->model("Activite");
        $this->load->model("Enfant");
        $data['nomEnfant'] = "";
        $data['prenomEnfant'] = "";
        $this->load->helper("Date_helper");
        $semaines = week2period(date("Y"), date("W"));
        $data['semaines'] = $semaines;

        $this->load->view('inscriptionActivite',$data);
    }
}