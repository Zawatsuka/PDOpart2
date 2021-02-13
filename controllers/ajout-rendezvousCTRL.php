<?php
    include(dirname(__FILE__).'/../utils/regex.php');
    include(dirname(__FILE__).'/../utils/function.php');
    include(dirname(__FILE__).'/../models/Patient.php');
    include(dirname(__FILE__).'/../models/Rendez-vous.php');


   

    $errorsArray=[];
    //On ne controle que s'il y a des données envoyées 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
        // verification de date et l'heure
        $dateHour = isset($_POST['dateHour']) && !empty($_POST['dateHour']) ? validateData($_POST['dateHour']) : '';
        testData($dateHour, $regexDateHour,'Date et Heure')== NULL ?? array_push($errorsArray,testData($dateHour, $regexDateHour,'Date et Heure'));  

        // verification du nom du patient
        $nameOfPatient = isset($_POST['nameOfPatient']) && !empty($_POST['nameOfPatient']) ? validateData($_POST['nameOfPatient']) : '';
        testData($nameOfPatient, $regexText,'nameOfPatient')== NULL ?? array_push($errorsArray,testData($nameOfPatient, $regexText,'nameOfPatient'));  
        
        $patient = new Patient();
        $patients = $patient->patientList();
        var_dump($patient);
        $rdv = new Rendezvous($dateHour,$id);
        $testRegister = $rdv->addRendezvous();
    }
    

    include(dirname(__FILE__).'/../views/template/header.php');

    include(dirname(__FILE__).'/../views/ajout-rendezvous.php');

    include(dirname(__FILE__).'/../views/template/footer.php');