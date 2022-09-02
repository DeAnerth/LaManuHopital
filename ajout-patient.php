<?php

declare(strict_types=1);

require 'models/Db.php';
require 'models/Patients.php';
require_once 'commun/header.php';
require_once 'controllers/ajout-patientCtrl.php';



?>
<div class="mx-5 mt-5 px-3 bg-light">
    <h1 id="pageFormTitlePatients" class="d-flex justify-content-center mt-5">INSCRIPTION PATIENT</h1>
    <p class="bg-danger" id="patientRegister"><?= isset($errors['patientRegister']) ? $errors['patientRegister'] : '' ?></p>
    <form id="formRegistrationPatients" class="m-5" method="POST" action="">
        <fieldset class="row mb-4">
            <legend class="mb-5">DETAILS PERSONNELS</legend>
            <div class="form-label row mb-3">
                <label for="firstname" class="form-label col-sm-3">Prénom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" placeholder="firstName">
                    <span class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
                </div>
            </div>
            <div class="form-label row mb-3">
                <label for="lastname" class="form-label col-sm-3">Nom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname">
                    <span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                </div>
            </div>
            <div class="form-label row mb-3">
                <label for="birthdate" class="form-label col-sm-3">Date de naissance</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="2015-09-02">
                    <span class="text-danger"><?= isset($errors['birthdate']) ? $errors['birthdate'] : '' ?></span>
                </div>
            </div>

        </fieldset>
        <fieldset class="row mb-4">
            <legend class="mb-5">COORDONNEES</legend>
            <div class="form-label row mb-3">
                <label for="mail" class="form-label col-sm-3">Adresse courriel</label>
                <div class="col-sm-9">
                    <input type="mail" class="form-control" name="mail" id="mail" placeholder="name@example.com">
                    <span class="text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span>
                </div>
            </div>
            <div class="form-label row mb-3">
                <label for="phone" class="form-label col-sm-3">Numéro de téléphone</label>
                <div class="col-sm-9">
                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="Format: 06 12 34 56 78 OU 02 34 56 78 91">
                    <span class="text-danger"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></span>
                </div>
            </div>
        </fieldset>
        <article class="row mb-1">
            <div class="vstack align-items-center col-md-5 mx-auto mb-4">
                <button type="submit" class="btn btn-primary col-md-5 mb-4" name="dataFormValidPatients">Inscrire</button>
            </div>
        </article>
        <article class="row mb-1">
            <div class="vstack align-items-center col-md-5 mx-auto mb-4">
                <a href="./liste-patients.php" type="button" class="btn btn-primary mb-4 col-md-5">Retour Liste des patients</a>
            </div>
        </article>
        <article class="row mb-1">
            <div class="vstack align-items-center col-md-5 mx-auto mb-4">
                <a href="./index.php" type="button" class="btn btn-primary mb-4 col-md-5">Retour Index</a>
            </div>
        </article>
    </form>
</div>
<?php
require_once './commun/footer.php';
