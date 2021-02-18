<?php
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../utils/regex.php');

$idRdv= intval(trim(filter_input(INPUT_GET,'idRdv', FILTER_SANITIZE_NUMBER_INT)));


$appointement = new Appointment();
$appointementView= $appointement->AppointmentView($idRdv);


$patient = new Patient();
   $getPatient= $patient->patientList();
$hadPatient = new Patient();
    $patientViews = $hadPatient->patientReview($appointementView->idPatients);
   
$errorsArray=[];
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

    $idPatients= trim(filter_input(INPUT_POST,'idPatients', FILTER_SANITIZE_NUMBER_INT));
    if(empty($errorsArray)){
        $appointmentMod = new Appointment($dateHour, $idPatients, $idRdv);
        $update = $appointmentMod->UpdateAppointment();
    }
    

}

include(dirname(__FILE__).'/../views/template/header.php');
include(dirname(__FILE__).'/../views/modifRdv.php');
include(dirname(__FILE__).'/../views/template/footer.php');