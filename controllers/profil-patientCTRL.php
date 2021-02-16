<?php
include(dirname(__FILE__).'/../models/Patient.php');
$patient = new Patient();
$idPatient = intval(trim(filter_input(INPUT_GET,'idPatient',FILTER_SANITIZE_NUMBER_INT)));

$patients = $patient->patientReview($idPatient);
include(dirname(__FILE__).'/../views/template/header.php');

include(dirname(__FILE__).'/../views/profil-patient.php');

include(dirname(__FILE__).'/../views/template/footer.php');