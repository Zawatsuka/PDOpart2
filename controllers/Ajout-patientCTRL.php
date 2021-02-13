<?php
    include(dirname(__FILE__).'/../utils/regex.php');
    include(dirname(__FILE__).'/../utils/function.php');
    include(dirname(__FILE__).'/../models/Patient.php');
    
    $errorsArray=[];
    //On ne controle que s'il y a des données envoyées 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
        // verification de l'adresse mail
        $mail = isset($_POST['mail']) && !empty($_POST['mail']) ? validateData($_POST['mail']) : '';
        testData($mail, $regexEmail,'Adresse Email')== NULL ?? array_push($errorsArray,testData($mail, $regexEmail,'Adresse Email'));  

        // verification de firstname
        $firstname = isset($_POST['firstname']) && !empty($_POST['firstname']) ? validateData($_POST['firstname']) : '';
        testData($firstname, $regexText,'firstname')== NULL ?? array_push($errorsArray,testData($firstname, $regexText,'firstname'));  

         // verification de lastname
         $lastname = isset($_POST['lastname']) && !empty($_POST['lastname']) ? validateData($_POST['lastname']) : '';
         testData($lastname, $regexText,'lastname')== NULL ?? array_push($errorsArray,testData($lastname, $regexText,'lastname'));  

         // verification de phone
         $phone = isset($_POST['phone']) && !empty($_POST['phone']) ? validateData($_POST['phone']) : '';
         testData($phone, $regexPhone,'phone')== NULL ?? array_push($errorsArray,testData($phone, $regexPhone,'phone'));  

        // verification de la date de naissance
        $birthdate = isset($_POST['birthdate']) && !empty($_POST['birthdate']) ? validateData($_POST['birthdate']) : '';
        testData($birthdate, $regexDate,'birthdate')== NULL ?? array_push($errorsArray,testData($birthdate, $regexDate,'birthdate'));  

        $patient = new Patient($firstname,$lastname,$birthdate,$mail,$phone);
        
        $testRegister = $patient->addPatient();
        // var_dump($patient);
    }
    

    include(dirname(__FILE__).'/../views/template/header.php');

    include(dirname(__FILE__).'/../views/ajout-patient.php');

    include(dirname(__FILE__).'/../views/template/footer.php');