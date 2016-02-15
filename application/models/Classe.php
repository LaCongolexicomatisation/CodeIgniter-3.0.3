<?php
class Classe extends CI_Model{
    protected $_idClasse;
    protected $_nomClasse;
    protected $_professeur;
    protected $_niveau;
    protected $_profRespClasse;
    protected static $_PDO;

    public function __construct($id = NULL, $nom = "", $prof = "", $niveau = "", $responsable = ""){
        SELF::$_PDO = $this->load->database('pdo', true);
        $this->_idClasse = $id;
        $this->_nomClasse = $nom;
        $this->_professeur = $prof;
        $this->_niveau = $niveau;
        $this->_profRespClasse = $responsable;
    }

    /**
     * @return mixed
     */
    public function idClasse()
    {
        return $this->_idClasse;
    }

    /**
     * @param mixed $idClasse
     */
    public function setIdClasse($idClasse)
    {
        $this->_idClasse = $idClasse;
    }

    /**
     * @return mixed
     */
    public function nomClasse()
    {
        return $this->_nomClasse;
    }

    /**
     * @param mixed $nomClasse
     */
    public function setNomClasse($nomClasse)
    {
        $this->_nomClasse = $nomClasse;
    }

    /**
     * @return mixed
     */
    public function professeur()
    {
        return $this->_professeur;
    }

    /**
     * @param mixed $professeur
     */
    public function setProfesseur($professeur)
    {
        $this->_professeur = $professeur;
    }

    /**
     * @return mixed
     */
    public function niveau()
    {
        return $this->_niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->_niveau = $niveau;
    }

    /**
     * @return mixed
     */
    public function profRespClasse()
    {
        return $this->_profRespClasse;
    }

    /**
     * @param mixed $profRespClasse
     */
    public function setProfRespClasse($profRespClasse)
    {
        $this->_profRespClasse = $profRespClasse;
    }

    public static function getById($id){
        $stmt = SELF::$_PDO->query("SELECT * FROM classe WHERE idClasse=" . $id);
        $data = $stmt->row_array();
        return new Classe($data['idClasse'],$data['nomClasse'],$data['professeur'],$data['niveau'],$data['profRespClasse']);
    }

}