<?php

class model_Enfant extends CI_Model{
    protected static $_PDO;

    public function __construct()
    {
        parent::__construct();
        require_once("Enfant.php");
        SELF::$_PDO = $this->load->database('pdo', true);
    }
    
    public static function create($nom,$prenom,$ddn){
        $stmt = SELF::$_PDO->query("insert into enfant (nomEnfant, prenomEnfant, dateDeNaissance) values ('".$nom."','".$prenom."',STR_TO_DATE('".$ddn."', '%Y-%m-%d'))");
        return $stmt;
    }
}
