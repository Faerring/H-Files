<?php
require('../modele/encapsulation.php');
require('../modele/utilisateur.php');
require('../modele/connexion.php');
session_start();
//empêcher l'accès à la page sans s'être authentifié
if (!(isset($_SESSION['user']))){
    echo "<script language='javascript'>alert('Bien tenté.');</script>";
    header("refresh:0;url=../controleur/loginpage.php");
}

$hospitalisation = execRequest::getHospitalisation("79567957957959757952791371257425",$dbh);
$donneesP = execRequest::viewPData("79567957957959757952791371257425",$dbh);
$depH = execRequest::getDepartement("79567957957959757952791371257425",$dbh);
$MedecinTraitant = execRequest::getMedecinTraitant("79567957957959757952791371257425",$dbh);
$allergies = execRequest::getAllergies("79567957957959757952791371257425",$dbh);
$a_medicaux = execRequest::getAntecedentMedicaux("79567957957959757952791371257425",$dbh);
$a_chirurgicaux = execRequest::getAntecedentChirurgicaux("79567957957959757952791371257425",$dbh);

if(isset($_POST['hosp'])) {
	
	$actes = execRequest::getActes("79567957957959757952791371257425",$_POST['hosp'], $dbh);
	
}
$const = execRequest::getConst("79567957957959757952791371257425",$dbh)->fetch();
require('../vue/consultation_patient.php');
?>
