<?php
// Affichage liste des RDV
$appointments = new Appointments;
$appointmentsList = $appointments->getAppointmentsList();

//Création d'un RDV
if (isset($_POST['dataFormValidAppointments'])) {
    if (isset(($_POST['birthdate']))) {
        $birthdate = htmlspecialchars($_POST['birthdate']);
    } 
    $appointments = new Appointments;
    $appointmentCreate = $appointments->createAppointment();

    }
