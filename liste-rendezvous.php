<?php
require 'models/Db.php';
require 'models/Appointments.php';
require 'models/Patients.php';
require_once 'commun/header.php';
require_once 'controllers/liste-patientCtrl.php';
require_once 'controllers/liste-rendezvousCtrl.php';

?>
<?php if (is_array($showAppointmentsListByOrder)) { ?>
    <h1 id="pageAppointmentList" class="d-flex justify-content-center mt-5 mb-5">LISTE DES RDV</h1>
    <section>
        <ul class="list-group list-group-horizontal mb-3">
            <li class="list-group-item col-sm-2">RDV</li>
            <li class="list-group-item col-sm-3">Nom</li>
            <li class="list-group-item col-sm-3">Prénom</li>
            <li class="list-group-item col-sm-2">Compte du patient</li>
        </ul>
        <?php foreach ($showAppointmentsListByOrder as $showAppointment) { ?>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item col-sm-2">
                    <?= changeDate($showAppointment->dateHour, 'Y-m-d H:i:s', 'd/m/Y H:i:s') ?>
                </li>
                <li class="list-group-item col-sm-3"><?= $showAppointment->lastname ?></li>
                <li class="list-group-item col-sm-3"><?= $showAppointment->firstname ?></li>
                <li class="list-group-item col-sm-2"><a href="profil-patient.php?id=<?= $showAppointment->idPatients ?>"><?= $showAppointment->idPatients ?></a></li>
            </ul>
    <?php }
    }
    ?>
    <div class="text-center mt-5 mb-4">
        <a href="./liste-patients.php" type="button" class="card-link btn btn-info col-sm-7 col align-self-center">Retour liste des patients</a>
    </div>
    <div class="text-center mt-5 mb-4">
        <a href="./rendezvous.php" type="button" class="card-link btn btn-info col-sm-7 col align-self-center">Rendez-vous Infos</a>
    </div>

    </section>