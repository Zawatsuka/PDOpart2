<?php
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');

$idRdv =intval(trim(filter_input(INPUT_GET,'idRdv',FILTER_SANITIZE_NUMBER_INT)));
$rendezVous = new Appointment();
$rdv = $rendezVous->listAppointment();
$deleted = new Appointment($idRdv);
$rdvDelete = $deleted->DeletedAppointment($idRdv);

include(dirname(__FILE__).'/../views/template/header.php');

include(dirname(__FILE__).'/../views/liste-rendez-vous.php');

include(dirname(__FILE__).'/../views/template/footer.php');