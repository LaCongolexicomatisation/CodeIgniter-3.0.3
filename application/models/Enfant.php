<?php

class Enfant extends CI_Model{
    protected $_id;
    protected $_nom;
    protected $_prenom;
    protected $_ddn;
    protected $_idClasse;
    protected static $_PDO;
    
    public function __construct($id = NULL, $nom = "", $prenom = "", $ddn = "", $idClasse = ""){
        SELF::$_PDO = $this->load->database('pdo', true);
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_ddn = $ddn;
        $this->_idClasse = $idClasse;
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
    public function idClasse()
    {
        return $this->_idClasse;
    }

    /**
     * @param string $idClasse
     */
    public function setIdClasse($idClasse)
    {
        $this->_idClasse = $idClasse;
    }
    public static function create($nom,$prenom,$ddn){
        $stmt = SELF::$_PDO->query("insert into enfant (nomEnfant, prenomEnfant, dateDeNaissance) values ('".$nom."','".$prenom."',STR_TO_DATE('".$ddn."', '%Y-%m-%d'))");
        return $stmt;
    }
    public static function getEnfants(){
        $stmt = SELF::$_PDO->query("SELECT * FROM enfant");
        if ($stmt->result()) {
            $tab = array();
            foreach($stmt->result_array() as $data){
                $tab[] = new Enfant(
                    $data['idEnfant'],
                    $data['nomEnfant'],
                    $data['prenomEnfant'],
                    $data['dateDeNaissance'],
                    $data['idClasse']
                );
            }
            return $tab;
        }
    }

    /**
     * @return string
     */

}
