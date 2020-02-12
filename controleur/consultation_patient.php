<?php
require('../modele/connexion.php');
require('../modele/consultation_patient.php');

$hospitalisation = getHospitalisation($_SESSION['user']->getUUID());
$donneesP = viewPData($_SESSION['user']->getUUID());
$depH = getDepartement($_SESSION['user']->getUUID());
$allergies = getAllergies($_SESSION['user']->getUUID());
$a_medicaux = getAntecedentMedicaux($_SESSION['user']->getUUID());
$a_chirurgicaux = getAntecedentChirurgicaux($_SESSION['user']->getUUID());

if(isset($_POST['hosp'])) {
	$actes = getActes($_SESSION['user']->getUUID(),$_POST['hosp']);
}
$const = getConst();
require('../vue/consultation_patient.php');
?>
