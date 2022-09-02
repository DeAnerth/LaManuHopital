<?php
$regexLetter = "/^[a-zâêîôûäëïöüàèìòùé]{1,50}$/i";
$regexPhone = "/^0[1-79][0-9]{8}$/";
//
$errors = [];
//
$ok = [];
$patient = new Patients;
// fonction pour afficher patient avec
//condition vérification si l'URL envoyée contient bien une ID, une ID entier, une ID existante

if (isset($_GET['id']) && (is_numeric($_GET['id'])) && ($patient->isIdTrue($_GET['id']))) {
    $showPatientInformation = $patient->getPatientInfo($_GET['id']);
} else {
    ?><p>Contactez la DSI</p><?php
    exit;
}

// fonction pour modifier patient avec controller
if (isset($_POST['dataFormValidUpdatePatients'])) {
    if (!empty($_POST['updateFirstname'])) {
        if (strlen($_POST['updateFirstname']) <= 50) {
            if (preg_match($regexLetter, $_POST['updateFirstname'])) {
                $patient->firstname = htmlspecialchars($_POST['updateFirstname']);
            } else {
                $errors['updateFirstname'] = 'Le champ Prénom ne doit comporter que des lettres minuscules et majuscules';
            }
        } else {
            $errors['updateFirstname'] = 'Le champ Prénom doit comporter au maximum 50 caractères';
        }
    } else {
        $errors['updateFirstname'] = 'Le champ Prénom doit être rempli';
    }
    if (!empty($_POST['updateLastname'])) {
        if (strlen($_POST['updateLastname']) <= 50) {
            if (preg_match($regexLetter, $_POST['updateLastname'])) {
                $patient->lastname = htmlspecialchars($_POST['updateLastname']);
            } else {
                $errors['updateLastname'] = 'Le champ Nom ne doit comporter que des lettres minuscules et majuscules';
            }
        } else {
            $errors['updateLastname'] = 'Le champ Nom doit comporter au maximum 50 caractères';
        }
    } else {
        $errors['updateLastname'] = 'Le champ Nom doit être rempli';
    }
    if (!empty($_POST['updateBirthdate'])) {
        $updateBirthdate = $_POST['updateBirthdate'];
        $checkUpdateBirthdate = explode('-', $updateBirthdate);
        if (count($checkUpdateBirthdate) === 3 && checkdate($checkUpdateBirthdate[1], $checkUpdateBirthdate[2], $checkUpdateBirthdate[0])) {
            $patient->birthdate = htmlspecialchars($_POST['updateBirthdate']);
        } else {
            $errors['updateBirthdate'] = 'Le champ Date de naissance doit être une date valide';
        }
    } else {
        $errors['updateBirthdate'] = 'Le champ Date de naissance doit être rempli';
    }

    if (!empty($_POST['updatePhone'])) {
        if (preg_match($regexPhone, $_POST['updatePhone'])) {
            $patient->phone = htmlspecialchars($_POST['updatePhone']);
        } else {
            $errors['updatePhone'] = 'Le champ Téléphone doit respecter le modèle affiché';
        }
    } else {
        $errors['updatePhone'] = 'Le champ Téléphone doit être rempli';
    }
    if (!empty($_POST['updateMail'])) {
        if (filter_var(($_POST['updateMail']), FILTER_VALIDATE_EMAIL)) {
            $patient->mail = htmlspecialchars($_POST['updateMail']);
        } else {
            $errors['updateMail'] = 'Le champ Email ne respecte par les caractèristiques d\'un mail';
        }
    } else {
        $errors['updateMail'] = 'Le champ Email doit être rempli';
    }
    if (empty($errors)) {
            $patient->updatePatient($_GET['id']);
            header("Location: liste-patients.php");
            } else {
            $errors['patientRegister'] = 'Le patient existe déjà';
            }
        }
        


