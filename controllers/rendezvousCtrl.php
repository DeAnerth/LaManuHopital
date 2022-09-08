<?php
$appointments = new Appointments;
$patient = new Patients;

if (isset($_GET['idAppointment']) && (is_numeric($_GET['idAppointment'])) && ($appointments->isIdAppointmentTrue($_GET['idAppointment']))) {
    // Récupérer les infos du rendez-vous
    $showAppointmentInformation = $appointments->getAppointmentInfo($_GET['idAppointment']);

} else {
    ?><p>Problème pour vérification idAppointment sur la liste des RDV du patient</p><?php
    exit;
}
if (isset($_GET['idAppointment']) && (is_numeric($_GET['idAppointment']))) {
    $idPatients = $showAppointmentInformation->idPatients;
    $showPatientInformation = $patient->getPatientInfo($idPatients);
} else {
    ?><p>Problème avec idPatients</p><?php
    exit;
}



if (isset($_POST['formValidUpdateRegistrationAppointment'])) {
    if (!empty($_POST['updateDateHour'])) {
        $UpdateAppointmentDateHour = $_POST['updateDateHour'];
        if (validateDate($UpdateAppointmentDateHour, 'Y-m-d\TH:i')) {
            $appointments->dateHour = htmlspecialchars($_POST['updateDateHour']);
        } else {
            $errors['updateDateHour'] = 'Le champ Date et Heure du RDV doit être une date valide';
        }
    } else {
        $errors['updateDateHour'] = 'Le champ Date et Heure du RDV doit être rempli';
    }
    if (empty($errors)) {
        if ($appointments->isAppointmentExist()){
            $errors['formUpdateRegistrationAppointments'] = 'Le RDV est déjà pris';
        }
        elseif (!$patient->isIdTrue($_POST['updateIdPatients'])) {
        $errors['updateIdPatients'] = 'L\'ID n\'existe pas';

        } else {
            $appointments->updateAppointment($_GET['idAppointment']);
            header("Location: liste-rendezvous.php");
        }
    } else {
        $errors['formUpdateRegistrationAppointments'] = 'Il y a des erreurs';
    
    } var_dump($errors);
    }





