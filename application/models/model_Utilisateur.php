<?php

class model_Utilisateur extends CI_Model
{
    protected static $_PDO;


    public function __construct()
    {
        parent::__construct();
        require_once("Utilisateur.php");
        SELF::$_PDO = $this->load->database('pdo', true);
    }
    
    public static function create($nom, $prenom, $idVille, $login, $motDePasse, $mail, $rang = 1){
        $requete = "insert into adulte (nom, prenom, idVille, login, motDePasse, adresseMail, rang) values"
                . " ( ?,?,?, ?, ?, ?, ?)";
        $stmt = SELF::$_PDO->query($requete, array($nom, $prenom, $idVille, $login, $motDePasse, $mail, $rang));
        return $stmt;
    }
    
    public static function loginExists($l){
        $requete = "SELECT login FROM adulte WHERE login = ?";
        $stmt = SELF::$_PDO->query($requete, array($l));
        
        $exist = false;
        
        if($stmt->result()){
            $exist = true;
        }
        return $exist;
    }
    
    public static function rechercheParent(){
        $requete = "SELECT concat(nom, concat('-', prenom)) as adulte from adulte";
        $stmt = SELF::$_PDO->query($requete);
        return $stmt->result_array();
    }

    static function getById($id){
        $stmt = SELF::$_PDO->query("SELECT * FROM adulte WHERE idAdulteResponsable=".$id);
        if($stmt->result()){
            $data= $stmt->row_array();
            return new Utilisateur(
                $data['idAdulte'],
                $data['nom'],
                $data['prenom'],
                $data['idVille'],
                $data['login'],
                $data['motDePasse'],
                $data['adresseMail'],
                $data['rang']
            );
        }
    }

    static function getByLogin($login){
        $stmt = SELF::$_PDO->query("SELECT * FROM adulte WHERE login='".$login."'");
        if($stmt->result()){
            $data= $stmt->row_array();
            return new Utilisateur(
                $data['idAdulte'],
                $data['nom'],
                $data['prenom'],
                $data['idVille'],
                $data['login'],
                $data['motDePasse'],
                $data['adresseMail'],
                $data['rang']
            );
        }
    }



}