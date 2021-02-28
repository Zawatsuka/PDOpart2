<?php
 include(dirname(__FILE__).'/../utils/regex.php');
 include(dirname(__FILE__).'/../utils/function.php');
 include(dirname(__FILE__).'/../models/Patient.php');
 include(dirname(__FILE__).'/../models/Appointment.php');
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {  

// ___________________________________________ 
    //on nettoie la date et l'heure

    $dateHour= trim(filter_input(INPUT_POST,'dateHour', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    // ****************************************************

    // on test la regex et on met un message d'erreur si c'est pas bon et si c'est pas rempli

    // ****************************************************
    if(!empty($dateHour)){
        
        $testRegex = preg_match($regexDateHour,$dateHour);
        if($testRegex == false){
            $errorsArray['dateHour_error'] = 'La date et l\'heure n\'est pas valide';
        }
    }else{
        $errorsArray['dateHour_error'] = 'Le champ n\'est pas rempli';
    }
// ________________________________________________________
     //on nettoie le mail

     $mail= trim(filter_input(INPUT_POST,'mail', FILTER_SANITIZE_EMAIL));
     // ****************************************************
 
     // on test la regex et on met un message d'erreur si c'est pas bon et si c'est pas rempli
 
     // ****************************************************
     if(!empty($mail)){
         
         $testRegex = preg_match($regexEmail,$mail);
         if($testRegex == false){
             $errorsArray['mail_error'] = 'Le mail n\'est pas valide';
         }
     }else{
         $errorsArray['mail_error'] = 'Le champ n\'est pas rempli';
     }

    //  ____________________________________ 

     //on nettoie le firstname

     $firstname= trim(filter_input(INPUT_POST,'firstname', FILTER_SANITIZE_STRING));
     // ****************************************************
 
     // on test la regex et on met un message d'erreur si c'est pas bon et si c'est pas rempli
 
     // ****************************************************
     if(!empty($firstname)){
         
         $testRegex = preg_match($regexText,$firstname);
         if($testRegex == false){
             $errorsArray['firstname_error'] = 'Le firstname n\'est pas valide';
         }
     }else{
         $errorsArray['firstname_error'] = 'Le champ n\'est pas rempli';
     }

     //  ____________________________________ 

     //on nettoie le lastname

     $lastname= trim(filter_input(INPUT_POST,'lastname', FILTER_SANITIZE_STRING));
     // ****************************************************
 
     // on test la regex et on met un message d'erreur si c'est pas bon et si c'est pas rempli
 
     // ****************************************************
     if(!empty($lastname)){
         
         $testRegex = preg_match($regexText,$lastname);
         if($testRegex == false){
             $errorsArray['lastname_error'] = 'Le lastname n\'est pas valide';
         }
     }else{
         $errorsArray['lastname_error'] = 'Le champ n\'est pas rempli';
     }

          //  ____________________________________ 

     //on nettoie le Telephone

     $phone= trim(filter_input(INPUT_POST,'phone', FILTER_SANITIZE_STRING));
     // ****************************************************
 
     // on test la regex et on met un message d'erreur si c'est pas bon et si c'est pas rempli
 
     // ****************************************************
     if(!empty($phone)){
         
         $testRegex = preg_match($regexPhone,$phone);
         if($testRegex == false){
             $errorsArray['phone_error'] = 'Le phone n\'est pas valide';
         }
     }else{
         $errorsArray['phone_error'] = 'Le champ n\'est pas rempli';
     }

        //  ____________________________________ 

     //on nettoie la date de naissance

     $birthdate= trim(filter_input(INPUT_POST,'birthdate', FILTER_SANITIZE_STRING));
     // ****************************************************
 
     // on test la regex et on met un message d'erreur si c'est pas bon et si c'est pas rempli
 
     // ****************************************************
     if(!empty($birthdate)){
         
         $testRegex = preg_match($regexDate,$birthdate);
         if($testRegex == false){
             $errorsArray['birthdate_error'] = 'La date de naissance n\'est pas valide';
         }
     }else{
         $errorsArray['birthdate_error'] = 'Le champ n\'est pas rempli';
     }

    //  _______________________________________ 
    $patient = new Patient($firstname,$lastname,$birthdate,$mail,$phone);
        
    $testRegister = $patient->addPatient();

    $rdv = new Appointment($dateHour);

    $addRDV = $rdv->addAppoWithOnePatient($testRegister);

}


include(dirname(__FILE__).'/../views/template/header.php');

include(dirname(__FILE__).'/../views/ajoutRdvEtPatient.php');

include(dirname(__FILE__).'/../views/template/footer.php');