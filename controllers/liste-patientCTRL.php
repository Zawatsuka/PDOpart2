<?php
require_once(dirname(__FILE__).'/../models/Patient.php');

if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}


$idPatients =intval(trim(filter_input(INPUT_GET,'idPatients',FILTER_SANITIZE_NUMBER_INT)));
$deleted = new Patient($idPatients);
$patientsDelete = $deleted->DeletedPatient($idPatients);

$countPatients = new Patient();
$count = $countPatients->countPatient();

$countP = $count->nb_patient;

$numberPerPage = 6;

$pages=ceil($countP / $numberPerPage);

$firstInPage= ($currentPage*$numberPerPage)-$numberPerPage;

if(isset($_GET['search'])){
    $searchInput =trim(filter_input(INPUT_GET,'search',FILTER_SANITIZE_STRING));
    $search = new Patient($searchInput);
    $getPatient = $search->searchPatient($searchInput);
}else{
    $patient = new Patient($firstInPage , $numberPerPage);
    $getPatient= $patient->patientList($firstInPage , $numberPerPage);
}

include(dirname(__FILE__).'/../views/template/header.php');

include(dirname(__FILE__).'/../views/liste-patients.php');

include(dirname(__FILE__).'/../views/template/footer.php');