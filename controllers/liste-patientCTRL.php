<?php
require_once(dirname(__FILE__).'/../models/Patient.php');

$idPatients =intval(trim(filter_input(INPUT_GET,'idPatients',FILTER_SANITIZE_NUMBER_INT)));
$deleted = new Patient($idPatients);
$patientsDelete = $deleted->DeletedPatient($idPatients);

$searchInput =trim(filter_input(INPUT_GET,'search',FILTER_SANITIZE_STRING));
$search = new Patient($searchInput);

$patientSearch = $search->searchPatient($searchInput);

include(dirname(__FILE__).'/../views/template/header.php');

include(dirname(__FILE__).'/../views/liste-patients.php');

include(dirname(__FILE__).'/../views/template/footer.php');