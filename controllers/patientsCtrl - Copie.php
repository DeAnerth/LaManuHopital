<?php
$regexLetter = "/^[a-zA-Zâêîôûäëïöüàèìòùé]{1,50}$/";
$regexPhone = "/^[0]{1}[1-5]{1}[0-9]{6}|[0]{1}[6-7]{1}[0-9]{6}$/";
$regexBirthdate = "/^([1]{1}[9]{1}|[2]{1}[0]{1})[0-9]{2}-([0]{1}[1-9]{1})|([1]{1}[0-2]{1})-([0]{1}[1-9]{1}|[1-2]{1}[0-9]{1}[3]{1}[0-1]{1})$/";
$ok = [];
$lastname = '';
//Affichage liste des patients
$patient = new Patients;
$showPatientsList = $patient->getPatientsList();
$error = new Patients;
$errorLastname = $error->isEmpty($lastname, 'lastname');
// //control formulaire inscription d'un patient
// switch (isset($_POST['dataFormValidPatients'])) {
//     case (empty($_POST['firstname'])):
//     echo $errors['firstname'] = '<p>Le champ Prénom doit être rempli<br></p>';
//     case (!strlen($_POST['firstname']) > 50):
//     echo $errors= 'Le champ Prénom doit comporter moins de 50 caractères';
//     case (!preg_match($regexLetter, $_POST['firstname'])):
//     echo $errors['firstname'] = 'Le champ Prénom ne doit comporter que des lettres minuscules et majuscules';
//     break;            
//     case (empty($_POST['lastname'])):
//     echo $errors = 'Le champ Nom doit être rempli';
//     case (!strlen($_POST['lastname']) > 50):
//     echo $errors = 'Le champ Nom doit comporter moins de 50 caractères';
//     case (!preg_match($regexLetter, $_POST['lastname'])):
//     echo $errors = 'Le champ Nom ne doit comporter que des lettres minuscules et majuscules';
//     break;
//     case (!empty($_POST['birthdate'])):
//     echo $errors = 'Le champ Date de naissance doit être rempli';
//     case (!preg_match($regexBirthdate, $_POST['birthdate'])):
//     echo $errors = 'Le champ Date de naissance doit respecter le format indiqué';
//     case (!empty($_POST['phone'])):
//     echo $errors = 'Le champ Téléphone doit être rempli';
//     case (strlen($_POST['phone']) > 11):
//     echo $errors = 'Le champ Téléphone doit comporter moins de 11 chiffres';
//     case (!preg_match($regexPhone, $_POST['phone'])):
//     echo $errors = 'Le champ Téléphone doit étre coññe le forñqt indiqué';
//     break;
//     case (!empty($_POST['mail'])):
//     echo $errors = 'Le champ Email doit être rempli';
//     case (strlen($_POST['mail']) > 50):
//     echo $errors = 'Le champ Email doit comporter moins de 50 caractères';
//     case (!filter_var(($_POST['mail']), FILTER_VALIDATE_EMAIL)):
//     echo $errors = 'Le champ Email ne respecte par les caractèristiques d\'un mail';
//     break;
//     default:
//         $patients = new Patients;
//         $patientCreate = $patients->createPatient();
//     }
//     var_dump($errors);
//     var_dump($error);
