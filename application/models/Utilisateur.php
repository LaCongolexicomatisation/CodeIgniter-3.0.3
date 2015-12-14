<?php

class Utilisateur {

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



}
