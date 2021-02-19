<?php
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
$patient = new Patient();
$idPatients = intval(trim(filter_input(INPUT_GET,'idPatient',FILTER_SANITIZE_NUMBER_INT)));
$patients = $patient->patientReview($idPatients);
$rendezVous = new Appointment($idPatients);
$rdv = $rendezVous->listAppointmentForOnePatient($idPatients);

include(dirname(__FILE__).'/../views/template/header.php');

include(dirname(__FILE__).'/../views/profil-patient.php');

include(dirname(__FILE__).'/../views/template/footer.php');