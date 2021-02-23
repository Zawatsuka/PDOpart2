<?php
require_once(dirname(__FILE__).'/../utils/database.php');
class Patient{

    private $_id;
    private $_firstname;
    private $_lastname;
    private $_birthdate;
    private $_phone;
    private $_mail;

    private $_pdo;



    public function __construct($firstname=NULL, $lastname=NULL, $birthdate=NULL, $mail=NULL, $phone=NULL, $id=NULL)
    {
        $this->_firstname= $firstname;
        $this->_lastname= $lastname;
        $this->_birthdate= $birthdate;
        $this->_mail= $mail;
        $this->_phone= $phone;
        $this->_id = $id;
        $this-> _pdo = Database::connectToBdd();
    }
    // ('$this->_lastname','$this->_firstname','$this->_birthdate','$this->_phone','$this->_mail')";
    public  function addPatient(){
        $sql = "INSERT INTO `patients` (`lastname`,`firstname`,`birthdate`,`phone`,`mail`)VALUE 
        (:lastname,:firstname,:birthdate,:phone,:mail);";
        $stmt = $this->_pdo->prepare($sql);
        $stmt ->bindValue(':lastname',$this->_lastname , PDO::PARAM_STR);
        $stmt ->bindValue(':firstname',$this->_firstname , PDO::PARAM_STR);
        $stmt ->bindValue(':birthdate',$this->_birthdate , PDO::PARAM_STR);
        $stmt ->bindValue(':phone',$this->_phone , PDO::PARAM_STR);
        $stmt ->bindValue(':mail',$this->_mail , PDO::PARAM_STR);

        return($stmt->execute()) ? true : false;
    }

    public function patientList($firstInPage , $numberPerPage){
        $sql = "SELECT * FROM `patients` LIMIT :firstInPage , :numberPerPage;";
        $sth = $this->_pdo->prepare($sql);
        $sth->bindValue(':firstInPage', $firstInPage , PDO::PARAM_INT);
        $sth->bindValue(':numberPerPage', $numberPerPage, PDO::PARAM_INT);
        $sth->execute();
        $patients = $sth->fetchAll();
        return $patients; 
    }

    public function patientJustList(){
        $sql = "SELECT * FROM `patients`";
        $sth = $this->_pdo->prepare($sql);
        $sth->execute();
        $patients = $sth->fetchAll();
        return $patients; 
    }

    public function patientReview($id){
        $sql = "SELECT * FROM `patients` WHERE `id`= :id;";
        $sth = $this->_pdo->prepare($sql);
        $sth-> bindValue(':id',$id, PDO::PARAM_INT); 
        $sth->execute();
        $patient = $sth->fetch();
        return $patient; 
    }

    public function updatePatient(){
        try{
            $sql = "UPDATE `patients` SET `firstname`=:firstname, `lastname`=:lastname,`birthdate`=:birthdate,`phone`=:phone,`mail`=:mail
            WHERE `id` = :id;";
            $stmt = $this->_pdo->prepare($sql);
            $stmt -> bindValue(':lastname',$this->_lastname , PDO::PARAM_STR);
            $stmt -> bindValue(':firstname',$this->_firstname , PDO::PARAM_STR);
            $stmt -> bindValue(':birthdate',$this->_birthdate , PDO::PARAM_STR);
            $stmt -> bindValue(':phone',$this->_phone , PDO::PARAM_STR);
            $stmt -> bindValue(':mail',$this->_mail , PDO::PARAM_STR);
            $stmt -> bindValue(':id',$this->_id , PDO::PARAM_INT);
            return $stmt->execute();
        }catch(PDOException $e){
            return $e->getCode();
        }
    }
    public function DeletedPatient($idPatients){
        $sql = "DELETE FROM `patients` WHERE `id` = :idPatients;";
        $stmt = $this->_pdo->prepare($sql);
        $stmt-> bindValue(':idPatients' , $idPatients , PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function searchPatient($search){
        $sql = "SELECT * FROM `patients` WHERE `firstname` LIKE :search ";
        $stmt = $this ->_pdo->prepare($sql);
        $stmt-> bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public function countPatient(){
        $sql='SELECT COUNT(*) AS `nb_patient` FROM `patients`;';
        $stmt =$this ->_pdo->query($sql);
        return $stmt->fetch();
    }
    
    public function AddAppontmentPatient($dateHour,$idPatients){
        try{
            $sql = "INSERT INTO `patients` (`lastname`,`firstname`,`birthdate`,`phone`,`mail`)VALUE 
            (:lastname,:firstname,:birthdate,:phone,:mail);"; 
            $stmt = $this->_db->prepare($sql);
            $stmt->beginTransaction();
            $stmt ->bindValue(':lastname',$this->_lastname , PDO::PARAM_STR);
            $stmt ->bindValue(':firstname',$this->_firstname , PDO::PARAM_STR);
            $stmt ->bindValue(':birthdate',$this->_birthdate , PDO::PARAM_STR);
            $stmt ->bindValue(':phone',$this->_phone , PDO::PARAM_STR);
            $stmt ->bindValue(':mail',$this->_mail , PDO::PARAM_STR);
            $stmt->execute();
            $sql2="INSERT INTO `appointments` (`dateHour`,`idPatients`)VALUE 
            (:dateHour,:idPatients);";
            $stmt = $this->_db->prepare($sql2);
            $stmt -> bindValue(':dateHour',$this->$dateHour , PDO::PARAM_STR);
            $stmt -> bindValue(':idPatients',$this->$idPatients , PDO::PARAM_INT);
            $stmt->execute();
            $stmt->commit();
        }catch(Exception $e){

        }
    }
}