<?php
require 'models/Db.php';
require 'models/Patients.php';
require_once 'commun/header.php';
require_once 'controllers/liste-patientCtrl.php';

?>
<div class="mx-5 mt-5 px-3 bg-light">
    <h1 id="pageFormTitlePatients" class="d-flex justify-content-center mt-5">RECHERCHER PATIENT</h1>
    <form id="formSearchPatients" class="m-5" method="GET" action="">

        <fieldset class="row mb-4">
            <legend class="mb-5">PATIENTS</legend>
            <div class="form-label row mb-3">
                <label for="searchLastNameFirstNamePatient" class="form-label col-sm-3">Rechercher par Nom Prénom</label>
                <div class="col-sm-9">
                    <input type="search" class="form-control" name="q">
                </div>
            </div>
        </fieldset>
        <article class="row mb-5">
            <div class="vstack align-items-center col-md-5 mx-auto mb-5">
                <button type="submit" class="btn btn-primary mb-4" name="searchValidPatients">Rechercher</button>
                <!--                        <button type="submit" class="btn btn-primary mb-4" name="dataFormDeleted">Annuler</button>
                            -->
        </article>
    </form>

    <?php
    if (isset($showPatientsList)) { ?>
        <h1 id="pagePatientsList" class="d-flex justify-content-center mt-5 mb-5">LISTE DES PATIENTS</h1>
        <section>
            <ul class="list-group list-group-horizontal mb-3">
                <li class="list-group-item col-sm-4">Nom</li>
                <li class="list-group-item col-sm-4">Prénom</li>
                <li class="list-group-item col-sm-2">Date de Naissance</li>
                <li class="list-group-item col-sm-2">Compte du patient</li>
            </ul>
            <?php foreach ($showPatientsList as $showPatient) { ?>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item col-sm-4"><?= $showPatient->lastname ?></li>
                    <li class="list-group-item col-sm-4"><?= $showPatient->firstname ?></li>
                    <li class="list-group-item col-sm-2"><?= $showPatient->birthdate ?></li>
                    <li class="list-group-item col-sm-2">Identifiant: <a href="profil-patient.php?id=<?= $showPatient->id ?>"><?= $showPatient->id ?></a></li>
                </ul>
        <?php }
        } ?>
        </section>
        <div class="text-center mb-4 mt-5">
            <a href="./index.php" class="col align-self-center"><button class="btn btn-primary col-sm-7">Retour Index</button></a>
        </div>

</div>