<?php

class gestionEnfant extends CI_Controller
{


    public function index()
    {
        $this->load->view('gestionEnfant');
    }

    public function ajoutEnfant()
    {
        $this->load->model("Enfant");
        switch($_SERVER['REQUEST_METHOD']){
            case 'GET':
                if(isset($_SESSION['user'])){
                    $this->load->view('ajoutEnfant');
                }else{
                    $_SESSION["messagee"] = "Connexion requise";
                    header('Location:' . base_url() . "index.php/welcome/connexion");
                    exit();
                }
                break;
            case 'POST':
                if(isset($_POST) && isset($_POST["nomEnfant"]) && isset($_POST["prenomEnfant"]) && isset($_POST["ddnEnfant"])){
                    $ok = $this->insertion();
                    if($ok)
                        $_SESSION['messages'] = "Création réussie";
                    else
                        $_SESSION['messagee'] = "Échec de la création";
                    
                    header('Location: '.base_url().'index.php/gestionEnfant/ajoutEnfant');
                    exit();
                }else{
                    $_SESSION['messagee'] = "Erreur d'accès à la page demandée";
                    header('Location: ' . base_url());  
                    exit();
                }
               break;
        }
    }
    
    private function insertion(){
        $this->load->model("Utilisateur");
        $u = new Utilisateur();
        $presenceAdulte = false;
        $isOk = true;
        $enfant = new Enfant();
        $i = 0;
        foreach($_POST as $key => $value){
            if(strlen(strstr($key, "NouveauParent")) > 0){
                if(!$presenceAdulte){
                    $i = substr(strstr($key, "NouveauParent"), 13, strlen(strstr($key, "NouveauParent")));
                    $presenceAdulte = true;
                    $dpNomMethode = preg_split("/NouveauParent$i/", $key);
                    $method = "set_".$dpNomMethode[0];
                    $u->{$method}($value);
                }else{
                    if($i === substr(strstr($key, "NouveauParent"), 13, strlen(strstr($key, "NouveauParent")))){
                        $dpNomMethode = preg_split("/NouveauParent$i/", $key);
                        $method = "set_".$dpNomMethode[0];
                        $u->{$method}($value);
                    }else{
                        $i = substr(strstr($key, "NouveauParent"), 13, strlen(strstr($key, "NouveauParent")));
                        $login = strtolower(substr($u->prenom(), 0, 1).$u->nom());

                        $insertionParent = $this->insertionAdulte($login, $u);
                        if($insertionParent === false) {
                            $isOk = false ; 
                            break;
                        }
                        $u = new Utilisateur();
                        $dpNomMethode = preg_split("/NouveauParent$i/", $key);
                        $method = "set_".$dpNomMethode[0];
                        $u->{$method}($value);
                    }
                }
            }else if($key === "parentLieEnfant"){
                
            }else if(strlen(strstr($key, "parentExistant")) > 0){
                
            }else{
                $dpNomMethode = preg_split("/Enfant/", $key);
                $method = "set_".$dpNomMethode[0];
                $enfant->{$method}($value);
            }
        }
        if($presenceAdulte){
            $login = strtolower(substr($u->prenom(), 0, 1).$u->nom());
            if($this->insertionAdulte($login, $u) == false){
                $_SESSION['messagee'] = "Erreur lors de la création d'un adulte";
            }
        }
        $insertionEnfant = Enfant::create($enfant->nom(), $enfant->prenom(), $enfant->ddn());
        
        if($insertionEnfant === false || $insertionParent === false){
            $isOk = false;
        }
        return $isOk;
    }
    
    private function insertionAdulte($login, $u){
        $ok = false;
        $suffixeLogin = 1;
        $l = $login;
        do{
            if(Utilisateur::loginExists($l)){
                $l = $login . $suffixeLogin;
                $suffixeLogin+=1;
            }else
                $ok = true;
        }while(!$ok);
        $insertionParent = Utilisateur::create($u->nom(), $u->prenom(), intVal($u->idVille()), $l, $l, $u->mail());
        
        return $insertionParent;
    }
    
    public function rechercheParent(){
        if(isset($_POST["autorisation"]) && $_POST["autorisation"] === "1"){
            $this->load->model("model_Utilisateur");
            $adultes = Utilisateur::rechercheParent();

            $resultat = "";
            foreach ($adultes as $key => $value) {
                $resultat.=$value["adulte"].',';
            }
            echo substr($resultat, 0, strlen($resultat) - 1);
        }else{
            $_SESSION["messagee"] = "Erreur accès refusé";
            header('Location: ' . base_url());
            exit();
        }
    }
}