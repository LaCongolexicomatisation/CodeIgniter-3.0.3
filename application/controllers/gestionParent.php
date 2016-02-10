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
                if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST['idVille']) && isset($_POST['login'])&& isset($_POST['mdp'])&& isset($_POST['mail'])&& isset($_POST['tel'])){
                    $ok = Utilisateur::create($_POST['nom'],$_POST['prenom'],$_POST['idVille'],$_POST['login'],$_POST['mdp'],$_POST['mail'],$_POST['tel']);
                    if($ok)
                        $_SESSION['messages'] = "Création réussie";
                    else
                        $_SESSION['messagee'] = "Échec de la création";
                    header('Location: '.base_url().'index.php/gestionParent');
                    exit();
                }else{
                    $_SESSION['messagee'] = "Il manque des infos";
                    header('Location: '.base_url().'index.php/gestionParent/ajoutParent');
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
                $this->load->model("Utilisateur");
                $this->load->model("Ville");
                if(isset($_POST["id"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST['idVille']) && isset($_POST['login'])&& isset($_POST['mdp'])&& isset($_POST['mail'])&& isset($_POST['tel'])){
                    $ok = Utilisateur::update($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['idVille'],$_POST['login'],$_POST['mdp'],$_POST['mail'],$_POST['tel']);
                    if($ok)
                        $_SESSION['messages'] = "Modification réussie";
                    else
                        $_SESSION['messagee'] = "Échec de la modification";
                    header('Location: '.base_url().'index.php/gestionParent');
                    exit();
                }else{
                    $_SESSION['messagee'] = "Il manque des infos";
                    header('Location: '.base_url().'index.php/gestionParent/ajoutParent');
                    exit();
                }
                break;
        }
    }

}