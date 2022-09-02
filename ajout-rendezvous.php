<?php
declare(strict_types=1);
require 'models/Db.php';
require 'models/Appointments.php';
require 'models/Patients.php';
require_once 'commun/header.php';
require_once 'controllers/liste-patientCtrl.php';
require_once 'controllers/ajout-rendezvousCtrl.php';
?>
<div class="mx-5 mt-5 px-3 bg-light">
    <h1 id="pageFormTitleAppointments" class="d-flex justify-content-center mt-5">CREER UN RENDEZ VOUS</h1>
    <form id="formRegistrationAppointments" class="m-5" method="POST" action="">
        <fieldset class="row mb-4">
            <legend class="mb-5">PATIENT</legend>
            <div class="form-label row mb-3">
                <label for="idPatients" class="form-label col-sm-3">Patients</label>
                <div class="col-sm-9">
                <select class="form-control" name="idPatients" required>
                    <option disabled selected>Selectionnez</option>
                    <?php foreach ($showPatientsListByOrder as $showPatient) { ?>
                        <option value="<?= $showPatient->id ?>"><?= $showPatient->lastname ?><?= $showPatient->firstname ?><?= $showPatient->birthdate ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?= isset($errors['idPatients']) ? $errors['idPatients'] : '' ?></span>
                </div>
            </div>
            <div class="form-label row mt-5 mb-3">
                <label for="dateHour" class="form-label col-sm-3">Date et heure du RDV</label>
                <div class="col-sm-9">
                    <input type="datetime-local" class="form-control" name="dateHour" id="dateHour">
                    <span class="text-danger"><?= isset($errors['dateHour']) ? $errors['dateHour'] : '' ?></span>
                    <span class="text-danger"><?= isset($errors['formRegistrationAppointments']) ? $errors['formRegistrationAppointments'] : '' ?></span>
                </div>
            </div>
        </fieldset>
        <article class="row mb-5">
            <div class="vstack align-items-center col-md-5 mx-auto mb-5">
                <button type="submit" class="btn btn-primary col-md-5 mb-4" name="dataFormValidAppointment">Inscrire</button>
            </div>
        </article>
        <article class="row mb-5">
            <div class="vstack align-items-center col-md-5 mx-auto mb-5">
                <a href="./index.php" type="button" class="btn btn-primary mb-4 col-md-5">Index</a>
            </div>
        </article>
        <article class="row mb-5">
            <div class="vstack align-items-center col-md-5 mx-auto mb-5">
                <a href="./liste-rendezvous.php" type="button" class="btn btn-primary mb-4 col-md-5">Liste des RDVS</a>
            </div>
        </article>

    </form>
</div>
<?php
require_once './commun/footer.php';
