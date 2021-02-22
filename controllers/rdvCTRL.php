<?php 
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
// recuperation de l'id pour voir le rdv en question
$idRdv=intval(trim(filter_input(INPUT_GET,'idRdv',FILTER_SANITIZE_NUMBER_INT)));
$appointement = new Appointment();
$appointementView= $appointement->AppointmentView($idRdv);

// recuperation du patient pour utiliser ses infos dans la view  
$patient = new Patient();
$patients = $patient->patientReview($appointementView->idPatients);
include(dirname(__FILE__).'/../views/template/header.php');
include(dirname(__FILE__).'/../views/rdv.php');
include(dirname(__FILE__).'/../views/template/footer.php');