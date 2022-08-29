<?php
require 'models/Db.php';
require 'models/Appointments.php';
require_once 'commun/header.php';

?>
<div class="mx-5 mt-5 px-3 bg-light">
    <h1 id="pageFormTitleAppointments" class="d-flex justify-content-center mt-5">CREER UN RENDEZ VOUS PATIENT</h1>
    <form id="formRegistrationAppointments" class="m-5" method="POST" action="controller.php">
        <fieldset class="row mb-4">
            <legend class="mb-5">PATIENT</legend>
            <div class="form-label row mb-3">
                <label for="firstname" class="form-label col-sm-3">Prénom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="firstName">
                </div>
            </div>
            <div class="form-label row mb-3">
                <label for="lastname" class="form-label col-sm-3">Nom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname">
                </div>
            </div>
            <div class="form-label row mb-3">
                <label for="birthdate" class="form-label col-sm-3">date et heure</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="birthdate" id="birthdate" placeholder="12/05/2022 10.00">
                </div>
            </div>

        </fieldset>
            <article class="row mb-5">
                <div class="vstack align-items-center col-md-5 mx-auto mb-5">
                    <button type="submit" class="btn btn-primary mb-4" name="dataFormValidAppointments">Valider la création du rendez-vous</button>
                    <!--                        <button type="submit" class="btn btn-primary mb-4" name="dataFormDeleted">Annuler</button>
                            -->
            </article>

    </form>
</div>
