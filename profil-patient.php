<?php
require 'models/Db.php';
require 'models/Patients.php';
require 'models/Appointments.php';
require_once 'config/functions.php';
require_once 'controllers/profil-patientCtrl.php';
require_once 'controllers/liste-rendezvousCtrl.php';
require_once 'commun/header.php';
?>
<h1 class="d-flex justify-content-center">INFORMATIONS PATIENT</h1>
<div class="d-flex justify-content-center">
    <div class="card align-items-center mb-5 mt-5 w-50 p-3">
        <img src="./assets/images/patient.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center w-75 p-3">
            <h5 class="card-title" name="id">Informations</h5>
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
        <div class="card-body col align-self-center mt-5 w-100">
            <div class="text-center mb-4">
                <a href="profil-patient.php?id=<?= $showPatientInformation->id ?>&value=formUpdateRegistrationPatients" class="card-link btn btn-info col-sm-7" name="updateBtn">Modifier informations</a>
            </div>
            <?php if (isset($_GET['value'])) { ?>
                <form id="formUpdateRegistrationPatients" class="m-5" method="POST" action="">
                    <ul class="list-group list-group-flush border-0 w-100 p-3">
                        <ul class="list-group list-group-horizontal">
                            <label for="updateLastname" class="form-label col-sm-5">Nouveau nom</label>
                            <input type="text" class="form-control" name="updateLastname" id="updateLastname" value="<?= isset($_POST['dataFormValidUpdatePatients']) ? $_POST['updateLastname'] : $showPatientInformation->lastname ?>"></li>
                            <span class="text-danger"><?= isset($errors['updateLastname']) ? $errors['updateLastname'] : '' ?></span>
                        </ul>
                        <ul class="list-group list-group-horizontal">
                            <label for="updateFirstname" class="form-label col-sm-5">Nouveau prénom</label>
                            <input type="text" class="form-control" name="updateFirstname" id="updateFirstname" value="<?= isset($_POST['dataFormValidUpdatePatients']) ? $_POST['updateFirstname'] : $showPatientInformation->firstname ?>"></li>
                            <span class="text-danger"><?= isset($errors['updateFirstname']) ? $errors['updateFirstname'] : '' ?></span>
                        </ul>
                        <ul class="list-group list-group-horizontal">
                            <label for="updateBirthdate" class="form-label col-sm-5">Date de naissance à modifier</label>
                            <input type="text" class="form-control" name="updateBirthdate" id="updateBirthdate" value="<?= isset($_POST['dataFormValidUpdatePatients']) ? $_POST['updateBirthdate'] : $showPatientInformation->birthdate ?>"></li>
                            <span class="text-danger"><?= isset($errors['updateBirthdate']) ? $errors['updateBirthdate'] : '' ?></span>
                        </ul>
                        <ul class="list-group list-group-horizontal">
                            <label for="updatePhone" class="form-label col-sm-5">Nouveau téléphone</label>
                            <input type="phone" class="form-control" name="updatePhone" id="updatePhone" value="<?= isset($_POST['dataFormValidUpdatePatients']) ? $_POST['updatePhone'] : $showPatientInformation->phone ?>"></li>
                            <span class="text-danger"><?= isset($errors['updatePhone']) ? $errors['updatePhone'] : '' ?></span>
                        </ul>
                        <ul class="list-group list-group-horizontal">
                            <label for="updateMail" class="form-label col-sm-5">Nouvel email</label>
                            <input type="mail" class="form-control" name="updateMail" id="updateMail" value="<?= isset($_POST['dataFormValidUpdatePatients']) ? $_POST['updateMail'] : $showPatientInformation->mail ?>"></li>
                            <span class="text-danger"><?= isset($errors['updateMail']) ? $errors['updateMail'] : '' ?></span>
                        </ul>
                    </ul>
                    <div class="vstack align-items-center mx-auto mt-4 mb-5">
                        <button type="submit" class="btn btn-info col-sm-8 mb-4" name="dataFormValidUpdatePatients">Inscrire</button>
                    </div>
                </form>
            <?php } ?>
            <div class="text-center mb-4">
                <a href="profil-patient.php?idDelete=<?= $showPatientInformation->id ?>" type="button " class="card-link btn btn-info col-sm-7 col align-self-center" name="deleteBtn">Supprimer Patient</a>
            </div>
            <div class="text-center mb-4">
                <a href="./liste-patients.php" type="button" class="card-link btn btn-info col-sm-7 col align-self-center">Retour liste des patients</a>
            </div>
            <div class="text-center mb-4">
                <a href="./liste-rendezvous.php" type="button" class="card-link btn btn-info col-sm-7 col align-self-center">Retour liste des RDV</a>
            </div>
        </div>
        <div class="text-center mb-4">
            <h5>LISTE DES RDVS</h5>
            <?php foreach ($getAppointmentsListByOrderDateAndByIdPatients as $showAppointment) { ?>
                <ul clas="list-group list-group-flush border-0 w-100 p-3">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item col-sm-12"><?= changeDate($showAppointment->dateHour, 'Y-m-d H:i:s', 'd/m/Y H:i') ?></li>
                    </ul>
                </ul>
            <?php }
            ?>
        </div>
    </div>