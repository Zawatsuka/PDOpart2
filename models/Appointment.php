<?php
require_once(dirname(__FILE__).'/../utils/database.php');
class Appointment{
    private $_dateHour;
    private $_idPatients;
    private $_db;

    public function __construct($dateHour=NULL, $idPatients=NULL)
    {
        
        $this->_dateHour= $dateHour;
        $this->_idPatients = $idPatients;
        $this-> _db = Database::connectToBdd();

    }
    public  function addRendezVous(){
        $sql = "INSERT INTO `appointments` (`dateHour`,`idPatients`)VALUE 
        (:dateHour,:idPatients)";
        $stmt = $this->_db->prepare($sql);
        $stmt -> bindValue(':dateHour',$this->_dateHour , PDO::PARAM_STR);
        $stmt -> bindValue(':idPatients',$this->_idPatients , PDO::PARAM_INT);
        var_dump($this);
        return($stmt->execute()) ? true : false;
    }
}