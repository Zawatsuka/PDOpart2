<?php
require_once(dirname(__FILE__).'/../utils/database.php');
class Appointment{
    private $_dateHour;
    private $_idPatients;
    private $_id;
    private $_db;

    public function __construct($dateHour=NULL, $idPatients=NULL, $id=NULL)
    {
        
        $this->_dateHour= $dateHour;
        $this->_idPatients = $idPatients;
        $this->_id = $id;
        $this-> _db = Database::connectToBdd();

    }
    public  function addRendezVous(){
        $sql = "INSERT INTO `appointments` (`dateHour`,`idPatients`)VALUE 
        (:dateHour,:idPatients)";
        $stmt = $this->_db->prepare($sql);
        $stmt -> bindValue(':dateHour',$this->_dateHour , PDO::PARAM_STR);
        $stmt -> bindValue(':idPatients',$this->_idPatients , PDO::PARAM_INT);
        return($stmt->execute()) ? true : false;
    }
    public function listAppointment(){
        $sql = "SELECT `patients`.`lastname`,`patients`.`firstname`, `appointments`.`dateHour`, `appointments`.`id`
                FROM `appointments`
                LEFT JOIN `patients` 
                ON `appointments`.`idPatients`=`patients`.`id`";
        $sth = $this->_db->query($sql);
        $rdv = $sth->fetchAll();
        return $rdv; 
    }
    public function AppointmentView($id){
    $sql ="SELECT * FROM `appointments` WHERE `id`= :id";
    $sth = $this-> _db->prepare($sql);
    $sth-> bindValue(':id',$id, PDO::PARAM_INT);
    $sth->execute();
    return $sth -> fetch();
    }

    public function UpdateAppointment(){
        $sql ="UPDATE `appointments` 
        SET `dateHour`= :dateHour , `idPatients`= :idPatients 
        WHERE `id` = :id";
        $stmt = $this->_db->prepare($sql);
        $stmt -> bindValue(':dateHour',$this->_dateHour , PDO::PARAM_STR);
        $stmt -> bindValue(':idPatients',$this->_idPatients , PDO::PARAM_INT);
        $stmt -> bindValue(':id',$this->_id , PDO::PARAM_INT);
        return($stmt->execute()) ? true : false;
    }

    public function listAppointmentForOnePatient($idPatients){
       $sql ="SELECT * FROM `appointments` WHERE `idPatients` = :idPatients"; 
       $stmt = $this->_db->prepare($sql);
       $stmt-> bindValue(':idPatients',$idPatients, PDO::PARAM_INT);
       $stmt->execute(); 
       return $stmt->fetchAll(); 
    }

    public function DeletedAppointment($idRdv){
        $sql = "DELETE FROM `appointments` WHERE `id` = :idRdv";
        $stmt = $this->_db->prepare($sql);
        $stmt-> bindValue(':idRdv' , $idRdv , PDO::PARAM_INT);
        return $stmt->execute();
    }

}