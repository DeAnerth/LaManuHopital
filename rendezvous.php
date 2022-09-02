<?php
require 'models/Db.php';
require 'models/Appointments.php';
require 'controllers/Ctrl.php';
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
        <h5>RDVS</h5>
        <?php foreach ($getAppointmentsListByOrderDateAndByIdPatients as $showAppointment) { ?>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item col-sm-2"><?= changeDate($showAppointment->dateHour, 'Y-m-d H:i:s', 'd-m-Y H:i:s') ?></li>
                <li class="list-group-item col-sm-2"><a href="profil-patient.php?id=<?= $showAppointment->id ?>"><?= $showAppointment->id ?></a></li>
            </ul>
    <?php }
    
    ?>
    