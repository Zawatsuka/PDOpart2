<?php
include(dirname(__FILE__).'/../models/Patient.php');
$patient = new Patient();
$idPatient = $_GET['idPatient'];
$patients = $patient->patientReview($idPatient);
include(dirname(__FILE__).'/../views/template/header.php');

include(dirname(__FILE__).'/../views/profil-patient.php');

include(dirname(__FILE__).'/../views/template/footer.php');