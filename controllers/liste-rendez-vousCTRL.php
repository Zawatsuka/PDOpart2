<?php
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');

$rendezVous = new Appointment();
$rdv = $rendezVous->listAppointment();

include(dirname(__FILE__).'/../views/template/header.php');

include(dirname(__FILE__).'/../views/liste-rendez-vous.php');

include(dirname(__FILE__).'/../views/template/footer.php');