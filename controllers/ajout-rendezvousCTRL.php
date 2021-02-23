<?php
    require_once(dirname(__FILE__).'/../utils/regex.php');
    require_once(dirname(__FILE__).'/../models/Patient.php');
    require_once(dirname(__FILE__).'/../models/Appointment.php');

    $errorsArray=[];
    //On ne controle que s'il y a des données envoyées 
    $patient = new Patient();
    $patients = $patient->patientJustList();

    // Si le server est bien sur la methode POST 
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {  


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
        

        //on nettoie l'id du patient

        $idPatients= trim(filter_input(INPUT_POST,'idPatients', FILTER_SANITIZE_NUMBER_INT));



        // Si il n'y a pas d'erreurs hydrate appointement et utilise la methode addRendezvous sinon afficher un message  
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