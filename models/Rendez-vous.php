<?php
include(dirname(__FILE__).'/../utils/database.php');
class Rendezvous{
    private $_dateHour;
    private $_id;
    private $_pdo;

    public function __construct($dateHour=NULL, $id=NULL)
    {
        
        $this->_dateHour= $dateHour;
        $this->_id = $id;
        $this-> _pdo = Database::connectToBdd();

    }
    public  function addRendezVous(){
        $sql = "INSERT INTO `appointments` (`dateHour`,`id`)VALUE 
        (:dateHour,:id)";
        $stmt = $this->_pdo->prepare($sql);
        $stmt -> bindValue(':dateHour',$this->_dateHour , PDO::PARAM_STR);
        $stmt -> bindValue(':id',$this->_id , PDO::PARAM_STR);
        return($stmt->execute()) ? true : false;
    }
}