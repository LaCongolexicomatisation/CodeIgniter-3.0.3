<?php

/**
 * Created by PhpStorm.
 * User: labai
 * Date: 03/02/2016
 * Time: 16:12
 */
class gestionParent extends CI_Controller
{
    public function index()
    {
        $this->load->model("Ville");
        $this->load->model("Utilisateur");
        $data['parents'] = Utilisateur::getParents();
        $this->load->view('gestionParent', $data);
    }

    public function ajoutParent()
    {
        $this->load->model("Utilisateur");
        $this->load->model("Ville");
        switch($_SERVER['REQUEST_METHOD']){
            case 'GET':
                if(isset($_SESSION['user'])){
                    $data['villes']=Ville::getAll();
                    $this->load->view('ajoutParent',$data);
                }else{
                    $_SESSION["messagee"] = "Connexion requise";
                    header('Location:' . base_url() . "index.php/welcome/connexion");
                    exit();
                }
                break;
            case 'POST':
                if(isset($_POST) && isset($_POST["nomParent"]) && isset($_POST["prenomParent"]) && isset($_POST['idVille']) && isset($_POST['login'])&& isset($_POST['mdp'])&& isset($_POST['mail'])&& isset($_POST['telephone'])){
                    $ok = Utilisateur::create($_POST['nomParent'],$_POST['prenomParent'],$_POST['idVille'],$_POST['login'],$_POST['mdp'],$_POST['mail'],$_POST['telephone']);
                    if($ok)
                        $_SESSION['messages'] = "Création réussie";
                    else
                        $_SESSION['messagee'] = "Échec de la création";

                    header('Location: '.base_url().'index.php/gestionParent/ajoutParent');
                    exit();
                }else{
                    $_SESSION['messagee'] = "Erreur d'accès à la page demandée";
                    header('Location: ' . base_url());
                    exit();
                }
                break;
        }
    }

    public function modifParent(){
        switch($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $this->load->model("Utilisateur");
                $this->load->model("Ville");
                if(isset($_SESSION['user'])){
                    $data['parent']=Utilisateur::getById($_GET['id']);
                    $data['villes']=Ville::getAll();
                    $this->load->view('modifierParent',$data);
                }else{
                    $_SESSION["messagee"] = "Connexion requise";
                    header('Location:' . base_url() . "index.php/welcome/connexion");
                    exit();
                }
                break;
            case 'POST':
        }
    }

}