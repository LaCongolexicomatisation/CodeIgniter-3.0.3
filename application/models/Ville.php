<?php

class Ville extends CI_Model
{

    protected static $_PDO;
    protected $_id;
    protected $_nom;
    protected $_code;

    public function __construct($id= NULL, $nom = "", $code = NULL)
    {
        SELF::$_PDO = $this->load->database('pdo', true);
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_code = $code;
    }

    public function id(){
        return $this->_id;
    }
    public function nom(){
        return $this->_nom;
    }
    public function code(){
        return $this->_code;
    }

    public static function getAll(){
        $stmt = SELF::$_PDO->query("SELECT * FROM ville");
        if($stmt->result()){
            $tab=array();
            foreach($stmt->result_array() as $data) {
                $tab[] = new Ville(
                    $data['idVille'],
                    $data['nomVille'],
                    $data['codePostal']
                );
            }
            return $tab;
        }

    }

    public static function getById($id){
        $stmt = SELF::$_PDO->query("SELECT * FROM ville WHERE idVille=" . $id);
        $data = $stmt->row_array();
        return new Ville($data['idVille'],$data['nomVille'],$data['codePostal']);
    }

}