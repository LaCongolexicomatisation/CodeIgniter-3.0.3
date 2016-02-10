<?php

class Enfant extends CI_Model{
    protected $_id;
    protected $_nom;
    protected $_prenom;
    protected $_ddn;
    protected static $_PDO;
    
    public function __construct($id = NULL, $nom = "", $prenom = "", $ddn = ""){
        $this->set_id($id);
        $this->set_nom($nom);
        $this->set_prenom($prenom);
        $this->set_ddn($ddn);
        SELF::$_PDO = $this->load->database('pdo', true);
    }
    
    function id() {
        return $this->_id;
    }

    function nom() {
        return $this->_nom;
    }

    function prenom() {
        return $this->_prenom;
    }

    function ddn() {
        return $this->_ddn;
    }
    function getClasse($id){
        $requete ="SELECT nomClasse FROM classe JOIN enfant ON classe.idClasse = enfant.idClasse WHERE enfant.idClasse= ?";
        $stmt = SELF::$_PDO->query($requete, array($id));
        return $stmt;
    }
    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_nom($_nom) {
        $this->_nom = $_nom;
    }

    function set_prenom($_prenom) {
        $this->_prenom = $_prenom;
    }

    function set_ddn($_ddn) {
        $this->_ddn = $_ddn;
    }

    public static function create($nom,$prenom,$ddn){
        $stmt = SELF::$_PDO->query("insert into enfant (nomEnfant, prenomEnfant, dateDeNaissance) values ('".$nom."','".$prenom."',STR_TO_DATE('".$ddn."', '%Y-%m-%d'))");
        return $stmt;
    }
    public static function getEnfants(){
        $stmt = SELF::$_PDO->query("SELECT * FROM enfant");
        if ($stmt->result()) {
            $data = $stmt->row_array();
            return new Enfant(
                $data['idEnfant'],
                $data['nomEnfant'],
                $data['prenomEnfant'],
                $data['dateDeNaissance']
            );
        }
    }
}
