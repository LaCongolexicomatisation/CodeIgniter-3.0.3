<?php
class Agenda extends CI_Model
{
    protected $_idAgenda;
    protected $_idActivite;
    protected $_dateDebutActivite;
    protected $_dateFinActivite;
    protected $_jour;
    protected $_horaireDebutActivite;
    protected $_horaireFinActivite;
    protected static $_PDO;

    public function __construct($idAgenda=null,$idActivite=null,$dateDebutActivite="",$dateFinActivite="",$jour=null,$horaireDebutActivite="",$horaireFinActivite=""){
        $this->_idAgenda=$idAgenda;
        $this->_idActivite=$idActivite;
        $this->_dateDebutActivite=$dateDebutActivite;
        $this->_dateFinActivite=$dateFinActivite;
        $this->_jour=$jour;
        $this->_horaireDebutActivite=$horaireDebutActivite;
        $this->_horaireFinActivite=$horaireFinActivite;
        SELF::$_PDO = $this->load->database('pdo', true);
    }

    public function idActivite(){
        return intval($this->_idActivite);
    }
    public function dateDebutActivite(){
        return $this->_dateDebutActivite;
    }
    public function dateFinActivite(){
        return $this->_dateFinActivite;
    }
    public function jour(){
        return $this->_jour;
    }
    public function horaireDebutActivite(){
        return $this->_horaireDebutActivite;
    }
    public function horaireFinActivite(){
        return $this->_horaireFinActivite;
    }
    
    public function create(){
        $requete = "insert into agenda (idActivite, dateDebutActivite, dateFinActivite, jour, horaireDebutActivite, horaireFinActivite) "
                . "values (?, ?, ?, ?, ?, ?)";
        $stmt = SELF::$_PDO->query($requete, array($this->idActivite(),
                                                    $this->dateDebutActivite(),
                                                    $this->dateFinActivite(),
                                                    $this->jour(),
                                                    $this->horaireDebutActivite(),
                                                    $this->horaireFinActivite()));
        return $stmt;
    }

    public static function getAll(){
        $stmt = SELF::$_PDO->query("SELECT * FROM agenda");
        if($stmt->result()){
            $tab=array();
            foreach($stmt->result_array() as $data) {
                $tab[]=new Agenda(
                    $data['idAgenda'],
                    $data['idActivite'],
                    $data['dateDebutActivite'],
                    $data['dateFinActivite'],
                    $data['jour'],
                    $data['horaireDebutActivite'],
                    $data['horaireFinActivite']
                );
            }
        }
        return $tab;
    }

    public static function getById($id){
        $stmt = SELF::$_PDO->query("SELECT * FROM inscription where valideInscription=1 and idEnfant=".$id);
        if($stmt->result()){
            $data=$stmt->result_array()[0];
            $obj = new stdClass();
            $obj->idEnfant=$data['idEnfant'];
            $obj->idActivite=$data['idActivite'];
            $obj->dateDebutInscription=$data['dateDebutInscription'];
            $obj->dateFinInscription=$data['dateFinInscription'];
            $obj->valideInscription=$data['valideInscription'];
            return $obj;
        }
        return null;
    }
}