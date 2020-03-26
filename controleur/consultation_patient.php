<?php
require('../modele/encapsulation.php');
require('../modele/utilisateur.php');
require('../modele/connexion.php');
session_start();
//empêcher l'accès à la page sans s'être authentifié
if (!(isset($_SESSION['user']))) {
    echo "<script language='javascript'>alert('Bien tenté.');</script>";
    header("refresh:0;url=../controleur/loginpage.php");
}

$editable = false;
if (isset($_POST['edit'])) {
    $editable = true;
}

if (isset($_POST['endEdit'])) {
    $editable = false;
    $numSecu = $_POST['numSecu'];
    $UUID = execRequest::getUUID($numSecu, $dbh);
    $UUID = $UUID->fetch();
    $UUID = $UUID[0];

    //Infos persos
    if (isset($_POST['adresse'])) {
        $adresse = $_POST['adresse'];
        if ($adresse != "") {
            $res = execRequest::updatePersonalInfo($UUID, $adresse, "adresse", $dbh);
        }
    }
    if (isset($_POST['telephone'])) {
        $telephone = $_POST['telephone'];
        if ($telephone != "") {
            $res = execRequest::updatePersonalInfo($UUID, $telephone, "telephone", $dbh);
        }
    }
    if (isset($_POST['numSecuRepLegal'])) {
        $numSecuRepLegal = $_POST['numSecuRepLegal'];
        if ($numSecuRepLegal != "") {
            $res = execRequest::updatePersonalInfo($UUID, $numSecuRepLegal, "numSecuRepLegal", $dbh);
        }
    }
    if (isset($_POST['numRespLegal'])) {
        $numRespLegal = $_POST['numRespLegal'];
        if ($numRespLegal != "") {
            $res = execRequest::updatePersonalInfo($UUID, $numRespLegal, "numRespLegal", $dbh);
        }
    }

    //Constantes
    if (isset($_POST['Heure'])) {
        $heure = $_POST['Heure'];
        if ($heure != "") {
            $res = execRequest::updateConst($UUID, $heure, "Heure", $dbh);
        }
    }
    if (isset($_POST['FC'])) {
        $freq_cardiaque = $_POST['FC'];
        if ($freq_cardiaque != "") {
            $res = execRequest::updateConst($UUID, $freq_cardiaque, "FC", $dbh);
        }
    }
    if (isset($_POST['Saturation'])) {
        $saturation = $_POST['Saturation'];
        if ($saturation != "") {
            $res = execRequest::updateConst($UUID, $saturation, "Saturation", $dbh);
        }
    }
    if (isset($_POST['TA'])) {
        $tension = $_POST['TA'];
        if ($tension != "") {
            $res = execRequest::updateConst($UUID, $tension, "TA", $dbh);
        }
    }
    if (isset($_POST['Temp'])) {
        $temp = $_POST['Temp'];
        if ($temp != "") {
            $res = execRequest::updateConst($UUID, $temp, "Temp", $dbh);
        }
    }
    if (isset($_POST['Observation'])) {
        $observation = $_POST['Observation'];
        if ($observation != "") {
            $res = execRequest::updateConst($UUID, $observation, "Observation", $dbh);
        }
    }

}

$UUID = '79567957957959757952791371257425';

if (isset($_SESSION['UUID'])) {
    $UUID = $_SESSION['UUID'];
}
$hospitalisation = execRequest::getHospitalisation($UUID, $dbh);
$donneesP = execRequest::viewPData($UUID, $dbh);
$depH = execRequest::getDepartement($UUID, $dbh);
$MedecinTraitant = execRequest::getMedecinTraitant($UUID, $dbh);
$allergies = execRequest::getAllergies($UUID, $dbh);
$a_medicaux = execRequest::getAntecedentMedicaux($UUID, $dbh);
$a_chirurgicaux = execRequest::getAntecedentChirurgicaux($UUID, $dbh);

if (isset($_POST['hosp'])) {

    $actes = execRequest::getActes($UUID, $_POST['hosp'], $dbh);

}
$const = execRequest::getConst($UUID, $dbh)->fetch();
require('../vue/consultation_patient.php');
?>
