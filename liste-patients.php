<?php
require 'models/Db.php';
require 'models/Patients.php';
require_once 'commun/header.php';
require_once 'controllers/liste-patientCtrl.php';
require 'config/functions.php';


?>
<div class="mx-5 mt-5 px-3 bg-light">
    <h1 id="pageFormTitlePatients" class="d-flex justify-content-center mt-5">RECHERCHER PATIENT</h1>
    <form id="formSearchPatients" class="m-5" method="GET" action="">
        <fieldset class="row mb-4">
            <legend class="mb-5">PATIENTS</legend>
            <div class="form-label row mb-3">
                <label for="searchLastNamePatient" class="form-label col-sm-3">Rechercher par Nom Prénom</label>
                <div class="col-sm-9">
                    <input type="search" id="searchLastNamePatient" class="form-control" name="search" value="<?= isset($_GET['search'])? ($_GET['search']) : '' ?>" autocomplete="on">
                </div>
            </div>
        </fieldset>
        <article class="row mb-5">
            <div class="vstack align-items-center col-md-5 mx-auto mb-5">
                <button type="submit" class="btn btn-primary mb-4" name="searchValidPatients">Rechercher</button>
        </article>
    </form>
    <?php 
    if (isset($resultSearchPatient)) {
    foreach ($resultSearchPatient as $searchPatient) { ?>
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item col-sm-4"><?= $searchPatient->lastname ?></li>
            <li class="list-group-item col-sm-4"><?= $searchPatient->firstname ?></li>
            <li class="list-group-item col-sm-2"><?= $searchPatient->mail ?></li>
            <li class="list-group-item col-sm-2">Identifiant: <a href="profil-patient.php?id=<?= $searchPatient->id ?>"><?= $searchPatient->id ?></a></li>
        </ul>
    <?php }}
    ?>


    <?php
    if (isset($showPatientsListWithLimitAndOffsetForPagination)) { ?>
        <h1 id="pagePatientsList" class="d-flex justify-content-center mt-5 mb-5">LISTE DES PATIENTS</h1>
        <section>
            <ul class="list-group list-group-horizontal mb-3">
                <li class="list-group-item col-sm-4">Nom</li>
                <li class="list-group-item col-sm-4">Prénom</li>
                <li class="list-group-item col-sm-2">Date de Naissance</li>
                <li class="list-group-item col-sm-2">Compte du patient</li>
            </ul>
            <?php foreach ($showPatientsListWithLimitAndOffsetForPagination as $showPatient) { ?>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item col-sm-4"><?= $showPatient->lastname ?></li>
                    <li class="list-group-item col-sm-4"><?= $showPatient->firstname ?></li>
                    <li class="list-group-item col-sm-2"><?= $showPatient->birthdate ?></li>
                    <li class="list-group-item col-sm-2">Identifiant: <a href="profil-patient.php?id=<?= $showPatient->id ?>"><?= $showPatient->id ?></a></li>
                </ul>
        <?php }
        } ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>"><a class="page-link" href="liste-patients.php?page=<?= $currentPage - 1 ?>">Previous</a></li>
                <?php for($i = 1; $i <= $nbPage; $i++) { ?>
                <li class="page-item <?= ($currentPage == $i) ? "active" : "" ?>"><a class="page-link" href="liste-patients.php?page=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>
                <li class="page-item <?= ($currentPage == $nbPage) ? "disabled" : "" ?>"><a class="page-link" href="liste-patients.php?page=<?= $currentPage + 1 ?>">Next</a></li>
            </ul>
        </nav>
        </section>
        <div class="text-center mb-4 mt-5">
            <a href="./index.php" class="col align-self-center"><button class="btn btn-primary col-sm-7">Retour Index</button></a>
        </div>

</div>