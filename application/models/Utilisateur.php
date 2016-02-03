<?php

class Utilisateur extends CI_Model{

    protected static $_PDO;
    protected $_idAdulteResponsable;
    protected $_nom;
    protected $_prenom;
    protected $_idVille;
    protected $_login;
    protected $_motDePasse;
    protected $_adresseMail;
    protected $_rang;
    
    public function __construct($idAdulteResponsable = NULL, $nom = "", $prenom = "", $idVille = NULL, $login = "", $motDePasse = "", $adresseMail = "", $rang = 1)
    {
        SELF::$_PDO = $this->load->database('pdo', true);
        $this->_idAdulteResponsable = $idAdulteResponsable;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_idVille = $idVille;
        $this->_login = $login;
        $this->_motDePasse = $motDePasse;
        $this->_adresseMail = $adresseMail;
        $this->_rang = $rang;
    }
    public function id(){
        return $this->_id;
    }
    
    public function nom(){
        return $this->_nom;
    }
    
    public function prenom(){
        return $this->_prenom;
    }
    
    public function idVille(){
        return $this->_idVille;
    }
    
    public function password(){
        return $this->_motDePasse;
    }

    public function login(){
        return $this->_login;
    }
    
    public function mail(){
        return $this->_adresseMail;
    }

    public function rang(){
        return $this->_rang;
    }
    
    function set_idAdulteResponsable($_idAdulteResponsable) {
        $this->_idAdulteResponsable = $_idAdulteResponsable;
    }

    function set_nom($_nom) {
        $this->_nom = $_nom;
    }

    function set_prenom($_prenom) {
        $this->_prenom = $_prenom;
    }

    function set_ville($_idVille) {
        $this->_idVille = $_idVille;
    }

    function set_login($_login) {
        $this->_login = $_login;
    }

    function set_motDePasse($_motDePasse) {
        $this->_motDePasse = $_motDePasse;
    }

    function set_mail($_adresseMail) {
        $this->_adresseMail = $_adresseMail;
    }

    function set_rang($_rang) {
        $this->_rang = $_rang;
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
    static function getVille($id){
        $stmt = SELF::$_PDO->query("SELECT nomVille FROM ville WHERE idVille=".$id);
        $data = $stmt->row_array();
        return $data['nomVille'];
    }
}
