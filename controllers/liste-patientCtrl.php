<?php
$patients = new Patients;
$showPatientsList = $patients->getPatientsList();
$showPatientsListByOrder = $patients->getPatientListByOrder();

if (isset($_GET['searchValidPatients']) && !empty(trim($_GET['search']))) {
    $searchPatient = htmlspecialchars(($_GET['search']));
    $resultSearchPatient = $patients->searchPatient($searchPatient);
} 

$page;
$offsetPaginationPatientsList;
$nbPatients = $patients->countPatientsList();
$pageLimitPaginationPatientsList = 10;
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = htmlspecialchars($_GET['page']);
} else {
    $currentPage = 1;
}
//nb de page par rapport au nb de patients
$nbPage = ceil($nbPatients/$pageLimitPaginationPatientsList);
$offsetPaginationPatientsList = ($currentPage * $pageLimitPaginationPatientsList) - $pageLimitPaginationPatientsList;
$showPatientsListWithLimitAndOffsetForPagination =$patients->patientsListWithLimitAndOffsetForPagination($offsetPaginationPatientsList, $pageLimitPaginationPatientsList);


