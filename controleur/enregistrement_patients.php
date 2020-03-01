<?php
session_start();
require_once('../modele/encapsulation.php');
require('../modele/connexion.php');

if (isset($_POST['AjouterHospitalisation'])) {
    $AjouterHospitalisation = $_POST['AjouterHospitalisation'];
}

if (isset($_POST['hospitalisation'])) {
    $hospitalisation = $_POST['hospitalisation'];
    $beginDate = $_POST['beginDate'];
    $finishdate = '';
    if (isset($_POST['finishDate'])) {
        $finishdate = $_POST['finishDate'];
    }
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
    $nodes = execRequest::getNodesID($dbh);
    $meds = execRequest::getMedTraitant($dbh);
}
require_once('../vue/enregistrement_patients.php');
?>
