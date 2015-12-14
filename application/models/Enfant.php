<?php

class Enfant {
    protected $_id;
    protected $_nom;
    protected $_prenom;
    protected $_ddn;
    
    public function __construct($id = NULL, $nom = "", $prenom = "", $ddn = ""){
        $this->set_id($id);
        $this->set_nom($nom);
        $this->set_prenom($prenom);
        $this->set_ddn($ddn);
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


}
