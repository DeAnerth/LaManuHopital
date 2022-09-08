<?php
$regexId = "/^[1-9]$/";
//
$errors = [];
//
$ok = [];
$appointments = new Appointments;
$patient = new Patients;

//on vérifie que le formulaire a bien été soumis
if (isset($_POST['dataFormValidAppointment'])) {
    if (!empty($_POST['dateHour'])) {
        $appointmentDateHour = $_POST['dateHour'];
        if (validateDate($appointmentDateHour, 'Y-m-d\TH:i')) {
            $appointments->dateHour = htmlspecialchars($_POST['dateHour']);
        } else {
            $errors['dateHour'] = 'Le champ Date et Heure du RDV doit être une date valide';
        }
    } else {
        $errors['dateHour'] = 'Le champ Date et Heure du RDV doit être rempli';
    }
    if (empty($errors)) {
        if ($appointments->isAppointmentExist()){
            $errors['formRegistrationAppointments'] = 'Le RDV est déjà pris';
        }
        elseif (!$patient->isIdTrue($_POST['idPatients'])) {
        $errors['idPatients'] = 'L\'ID n\'existe pas';

        } else {
            $appointments->createAppointment();
            header("Location: index.php");
        }
    } else {
        $errors['formRegistrationAppointments'] = 'Il y a des erreurs';
    
    } var_dump($errors);
}
