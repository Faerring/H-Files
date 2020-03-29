<?php

session_start();
include_once '../modele/connexion.php';
require '../modele/enregistrement_patients.php';
include_once '../modele/encapsulation.php';

if(isset($_POST['creerdossier'])){
    createDMP($_POST['UUID'], $_POST['NSS'], $_POST['NSSRepLegal'], $_POST['Nom'], $_POST['Prenom'], $_POST['sexe'], $_POST['DateDeNaissance'], $_POST['Adresse'], $_POST['lieuNaissance'], $_POST['telephone'], execRequest::getServicesFromHisName($_POST['IDNoeud'],$dbh), execRequest::getMedFromHisName($_POST['IDMedTraitant'],$dbh), $dbh);
}

if(isset($_SESSION['UUID']) && isset($_POST['ConsultPatient'])){
    header('Location: ./consultation_patient.php');
}

if (isset($_POST['AjouterHospitalisation'])) {
    $AjouterHospitalisation = $_POST['AjouterHospitalisation'];
}

if (isset($_POST['hospitalisation'])) {
    $hospitalisation = $_POST['hospitalisation'];
    $beginDate = $_POST['beginDate'];
    $finishdate = 'non connu';
    if (isset($_POST['finishDate'])) {
        $finishdate = $_POST['finishDate'];
    }
    $service = execRequest::getServicesFromHisName($_POST['IDNoeud'],$dbh);
    AddHospitalisation($UUID,$beginDate,$finishdate,$service);
}

if (isset($_SESSION['nom'])) {
    $nom = $_SESSION['nom'];
}
if (isset($_SESSION['prenom'])) {
    $prenom = $_SESSION['prenom'];
}
if (isset($_SESSION['UUID'])) {
    $UUID = $_SESSION['UUID'];
}

if (isset($_POST['SocialSecurityNumber'])) {
    $NSS = $_POST['SocialSecurityNumber'];
    $info = execRequest::folderInfoFromNSS($NSS, $dbh)->fetch();
    $name = $info['nom'];
    $firstName = $info['prenom'];
    $UUID = $info['UUID'];
    $idFound = array($name, $firstName, $UUID);
    $nodes = execRequest::getServices($dbh);
    $meds = execRequest::getMedTraitant($dbh);
}


include '../vue/enregistrement_patients.php';

