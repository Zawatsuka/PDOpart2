<?php
include(dirname(__FILE__).'/../models/Patient.php');
$patient = new Patient();
$patients = $patient->patientList();

include(dirname(__FILE__).'/../views/template/header.php');

include(dirname(__FILE__).'/../views/liste-patients.php');

include(dirname(__FILE__).'/../views/template/footer.php');