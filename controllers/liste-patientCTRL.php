<?php
include(dirname(__FILE__).'/../models/Patient.php');
$patient = new Patient();
$patients = $patient->patientList();

$idPatients =intval(trim(filter_input(INPUT_GET,'idPatients',FILTER_SANITIZE_NUMBER_INT)));
$deleted = new Patient($idPatients);
$patientsDelete = $deleted->DeletedPatient($idPatients);

$search =intval(trim(filter_input(INPUT_GET,'search',FILTER_SANITIZE_STRING)));
$search = new Patient($search);
$patientSearch = $search->searchPatient($search);
var_dump($patientSearch);

include(dirname(__FILE__).'/../views/template/header.php');

include(dirname(__FILE__).'/../views/liste-patients.php');

include(dirname(__FILE__).'/../views/template/footer.php');