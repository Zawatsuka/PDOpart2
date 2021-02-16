<?php
   include(dirname(__FILE__).'/../utils/regex.php');
   include(dirname(__FILE__).'/../utils/function.php');
   include(dirname(__FILE__).'/../utils/config.php');
   include(dirname(__FILE__).'/../models/Patient.php');
   
   $errorsArray=[];
   //On ne controle que s'il y a des données envoyées 
   $id= intval(trim(filter_input(INPUT_GET,'idPatient',FILTER_SANITIZE_NUMBER_INT)));
   $patient = new Patient();
   $getPatient= $patient->patientReview($id);
   if($getPatient == false){
       header('location: /index.php');
   }

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
        $phone = isset($_POST['phone']) ? validateData($_POST['phone']) : '';
        testData($phone, $regexPhone,'phone')== NULL ?? array_push($errorsArray,testData($phone, $regexPhone,'phone'));  

       // verification de la date de naissance
       $birthdate = isset($_POST['birthdate']) && !empty($_POST['birthdate']) ? validateData($_POST['birthdate']) : '';
       testData($birthdate, $regexDate,'birthdate')== NULL ?? array_push($errorsArray,testData($birthdate, $regexDate,'birthdate')); 

    if(empty($errorsArray)){
        $patient = new Patient($firstname,$lastname,$birthdate,$mail,$phone,$id);
       $update = $patient->updatePatient();
    //    var_dump($update);
    //    die;
       if($update === true){
           header('location:/controllers/liste-patientCTRL.php');
       }else{
           $errorsArray['erreur_global'] = $getMessage[$update];

       }
    }
   }
   

   include(dirname(__FILE__).'/../views/template/header.php');

   include(dirname(__FILE__).'/../views/modifier-patient.php');

   include(dirname(__FILE__).'/../views/template/footer.php');