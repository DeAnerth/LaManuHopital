<?php
$appointments = new Appointments;
$showAppointmentsListByOrder = $appointments->getAppointmentsListByOrderDate();

if (isset($_GET['idDelete']) && (is_numeric($_GET['idDelete'])) && ($appointments->isIdAppointmentTrue($_GET['idDelete']))) {
    $idDelete = ($_GET['idDelete']);
?>
    <div class="card text-center w-25 mx-auto">
        <div class="card-body">
            <p class="card-text">TOUTE SUPPRESSION SERA DEFINITIVE.</p>
            <a href="liste-rendezvous.php?idDeleteConfirmation=<?= $idDelete ?>" class="card-link btn btn-danger">Confirmez suppression</a>
        </div>
    </div>
<?php }

if (isset($_GET['idDeleteConfirmation'])) {
    var_dump($_GET['idDeleteConfirmation']);
    $appointments->deleteAppointment(($_GET['idDeleteConfirmation']));
    header("Location: liste-rendezvous.php");
}

/* 
    Permet de mettre en forme une date enregistrée 
    selon le format d'entrée $formatInput 
    et le format de sortie $formatOuput
*/
