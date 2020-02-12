<?php
require('../modele/connexion.php');
require('../modele/encapsulation.php');

$hospitalisation = execRequest::getHospitalisation($_SESSION['user']->getUUID());
$donneesP = execRequest::viewPData($_SESSION['user']->getUUID());
$depH = execRequest::getDepartement($_SESSION['user']->getUUID());
$allergies = execRequest::getAllergies($_SESSION['user']->getUUID());
$a_medicaux = execRequest::getAntecedentMedicaux($_SESSION['user']->getUUID());
$a_chirurgicaux = execRequest::getAntecedentChirurgicaux($_SESSION['user']->getUUID());

if(isset($_POST['hosp'])) {
	$actes = execRequest::getActes($_SESSION['user']->getUUID(),$_POST['hosp']);
}
$const = execRequest::getConst();
require('../vue/consultation_patient.php');
?>
