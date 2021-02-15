<?php
    require_once(dirname(__FILE__).'/../utils/regex.php');
    require_once(dirname(__FILE__).'/../utils/function.php');
    require_once(dirname(__FILE__).'/../models/Patient.php');
    require_once(dirname(__FILE__).'/../models/Appointment.php');


   

    $errorsArray=[];
    //On ne controle que s'il y a des données envoyées 
    $patient = new Patient();
    $patients = $patient->patientList();
    // var_dump($patients)
    // $browser= get_browser($_SERVER['HTTP_USER_AGENT'],true);
    // var_dump($browser);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
        // verification de date et l'heure
        $dateHour = isset($_POST['dateHour']) && !empty($_POST['dateHour']) ? validateData($_POST['dateHour']) : '';
        if(testData($dateHour, $regexText,'dateHour')== NULL){
            array_push($errorsArray,testData($dateHour, $regexText,'dateHour'));
        }
        // verification du nom du patient
        $idPatients = isset($_POST['idPatients']) && !empty($_POST['idPatients']) ? validateData($_POST['idPatients']) : '';
        if(testData($idPatients, $regexText,'idPatients')== NULL){
          array_push($errorsArray,testData($idPatients, $regexText,'idPatients'));   
        }  

        
        if(empty($errorsArray)){
        $rdv = new Appointment($dateHour,$idPatients);
        $testRegister = $rdv->addRendezvous($dateHour,$idPatients);
        }else{
            $errorMsg="il'y a des erreurs veuillez les corriger";
        }
    }
    

    include(dirname(__FILE__).'/../views/template/header.php');

    include(dirname(__FILE__).'/../views/ajout-rendezvous.php');

    include(dirname(__FILE__).'/../views/template/footer.php');