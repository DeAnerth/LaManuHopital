<?php
require 'models/Db.php';
require 'models/Patients.php';
require_once 'commun/header.php';
require_once 'controllers/patientsCtrl.php';

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
    if (is_array($showPatientsList)) { ?>
        <h1 id="pagePatientsList" class="d-flex justify-content-center mt-5">LISTE DES PATIENTS</h1>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Date d'anniversaire</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <select name="showPatientsList">
                        <td>
                            <option disabled selected value="">Patients</option>
                        </td>
                        <?php
                        foreach ($showPatientsList as $showPatient) { ?>
                            <td>
                                <option value="<?= $showPatient->id ?>"><?= $showPatient->firstname ?><?= $showPatient->lastname ?></option>
                            </td>
                        <?php   }
                        ?>
                    </select>
                    </tr>
                </tbody>
            </table>
        </section>
    <?php } else { ?>
        <p>Une erreur est survenue veuillez contacter le service informatique</p>
    <?php }
    ?>
</div>
</body>

</html>