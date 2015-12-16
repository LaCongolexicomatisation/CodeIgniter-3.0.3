<?php

class Theme extends CI_Model {
    protected $_idTheme;
    protected $_nomTheme;
    protected static $_PDO;

    public function __construct($idTheme=null,$nomTheme=""){
        $this->_idTheme = $idTheme;
        $this->_nomTheme = $nomTheme;
        SELF::$_PDO = $this->load->database('pdo', true);
    }

    public function id(){
        return $this->_idTheme;
    }

    public function nom(){
        return $this->_nomTheme;
    }

    public static function getNomById($id){
        $stmt = SELF::$_PDO->query("SELECT nomTheme FROM theme WHERE idTheme=".$id);
        return $stmt->result()[0]->nomTheme;
    }

    public static function getAll(){
        $stmt = SELF::$_PDO->query("SELECT * FROM theme");
        if($stmt->result()){
            $tab=array();
            foreach($stmt->result_array() as $theme) {
                $tab[] = new Theme($theme['idTheme'],$theme['nomTheme']);
            }
        }
        return $tab;
    }

    public static function getIdByNom($nom){
        $stmt = SELF::$_PDO->query("SELECT idTheme FROM theme WHERE nomTHeme='".$nom."'");
        return $stmt->result()[0]->idTheme;
    }

    public static function exist($nom){
        $stmt = SELF::$_PDO->query("SELECT idTheme FROM theme WHERE nomTHeme='".$nom."'");
        if($stmt->result()==null){
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function create($nom){
        $stmt = SELF::$_PDO->query("insert into theme(nomTheme) values ('".$nom."')");
        if($stmt){
            return model_Theme::getIdByNom($nom);
        }
    }

}