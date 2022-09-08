<?php
require 'models/Db.php';
require 'models/Appointments.php';
require 'models/Patients.php';
require 'config/functions.php';
require_once 'controllers/liste-rendezvousCtrl.php';
require_once 'controllers/liste-patientCtrl.php';
require_once 'controllers/ajout-rendezvousCtrl.php';
require_once 'controllers/rendezvousCtrl.php';
require_once 'commun/header.php';
?>
<h1 class="d-flex justify-content-center">INFORMATIONS RDV DU PATIENT</h1>
<div class="d-flex justify-content-center">
    <div class="card align-items-center mb-5 mt-5 w-50 p-3">
        <img src="./assets/images/patient.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center w-75 p-3">
            <h4 class="card-title" name="id">Informations</h4>
            <h5>Patient</h5>
        </div>
        <ul class="list-group list-group-flush border-0 w-100 p-3">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item col-sm-5">Nom</li>
                <li class="list-group-item col-sm-7"><?= $showPatientInformation->lastname ?></li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item col-sm-5">Prénom</li>
                <li class="list-group-item col-sm-7"><?= $showPatientInformation->firstname ?></li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item col-sm-5">Date de naissance</li>
                <li class="list-group-item col-sm-7"><?= $showPatientInformation->birthdate ?></li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item col-sm-5">Téléphone</li>
                <li class="list-group-item col-sm-7"><?= $showPatientInformation->phone ?></li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item col-sm-5">Email</li>
                <li class="list-group-item col-sm-7"><?= $showPatientInformation->mail ?></li>
            </ul>
        </ul>
        <h5>INFORMATION DU RDV</h5>
        <p class="row d-flex justify-content-center col-sm-12 mt-5"><?= changeDate($showAppointmentInformation->dateHour, 'Y-m-d H:i:s', 'd/m/Y H:i') ?></p>
        <div class="card-body col align-self-center mt-5 w-100">
            <div class="text-center mb-4">
                <a href="rendezvous.php?idAppointment=<?= $showAppointmentInformation->id ?>&value=formUpdateRegistrationAppointments" class="card-link btn btn-info col-sm-7" name="updateBtn">Modifier informations</a>
            </div>
            <?php if (isset($_GET['value'])) { ?>
                <form id="formUpdateRegistrationAppointments" class="m-5" method="POST" action="">
                    <div class="list-group list-group-flush border-0 w-100 p-3">
                            <div class="form-label row mb-3">
                                <label for="updateIdPatients" class="form-label col-sm-5">Patients</label>
                                    <select class="form-control" name="updateIdPatients" required>
                                        <?php foreach ($showPatientsListByOrder as $showPatient) { ?>
                                            <option <?= (($showPatient->id)==($showPatientInformation->id))? 'selected': ''; ?> value="<?= $showPatient->id?>"><?= $showPatient->lastname ?><?= $showPatient->firstname ?><?= $showPatient->birthdate ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-danger"><?= isset($errors['updateIdPatients']) ? $errors['updateIdPatients'] : '' ?></span>
                                </div>
                            <div class="form-label row mb-3">
                                <label for="updateDateHour" class="form-label col-sm-5">Date et heure à modifier</label>
                                <input type="datetime-local" class="form-control" name="updateDateHour" id="updateDateHour" value="<?= isset($_POST['formValidUpdateRegistrationAppointment']) ? $_POST['updateDateHour'] : $showAppointmentInformation->dateHour ?>"></li>
                                <span class="text-danger"><?= isset($errors['updateDateHour']) ? $errors['updateDateHour'] : '' ?></span>
                            </div>
                    </div>
                    <div class="vstack align-items-center mx-auto mt-4 mb-5">
                        <button type="submit" class="btn btn-info col-sm-8 mb-4" name="formValidUpdateRegistrationAppointment">Modifier</button>
                    </div>
                </form>
            <?php } ?>
            <div class="text-center mb-4">
            </div>