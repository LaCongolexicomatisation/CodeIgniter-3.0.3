<?php

class Activite extends CI_Model{

    protected $_idActivite;
    protected $_nomActivite;
    protected $_descriptionActivite;
    protected $_idTheme;
    protected static $_PDO;

    public function __construct($idActivite=null,$nomActivite="",$descriptionActivite="",$idTheme=null){
        $this->_idActivite=$idActivite;
        $this->_nomActivite = $nomActivite;
        $this->_descriptionActivite = $descriptionActivite;
        $this->_idTheme = $idTheme;
        SELF::$_PDO = $this->load->database('pdo', true);
    }
    public function idActivite(){
        return $this->_idActivite;
    }
    public function nom(){
        return $this->_nomActivite;
    }
    public function description(){
        return $this->_descriptionActivite;
    }
    public function idTheme(){
        return $this->_idTheme;
    }

    public static function getAll(){
        $stmt = SELF::$_PDO->query("SELECT * FROM activite");
        if($stmt->result()){
            $tab=array();
            foreach($stmt->result_array() as $data) {
                $tab[]=new Activite(
                    $data['idActivite'],
                    $data['nomActivite'],
                    $data['descriptionActivite'],
                    $data['idTheme']
                );
            }
        }
        return $tab;
    }

    public static function create($nom,$description,$idTheme){
        $stmt = SELF::$_PDO->query("insert into activite (nomActivite,descriptionActivite,idTheme) values ('".$nom."','".$description."',".$idTheme.")");
        return $stmt;
    }

    public static function get($id){
        $stmt = SELF::$_PDO->query("SELECT * FROM activite where idActivite=".$id);
        $data=$stmt->result();
        $activite=new Activite(
            $data[0]->idActivite,
            $data[0]->nomActivite,
            $data[0]->descriptionActivite,
            $data[0]->idTheme
        );
        return $activite;
    }

    public static function save($id,$nom,$description,$idTheme){
        $stmt = SELF::$_PDO->query("update activite set nomActivite='".$nom."',descriptionActivite='".$description."',idTheme=".$idTheme." where idActivite=".$id);
        return $stmt;
    }

    public static function delete($id){
        $stmt = SELF::$_PDO->query("delete from activite where idActivite=".$id);
        return $stmt;
    }
}