<?php
require('../modele/connexion.php');
require('../modele/encapsulation.php');

$hospitalisation = execRequest::getHospitalisation($_POST['UUID']);
$donneesP = execRequest::viewPData($_POST['UUID']);
$depH = execRequest::getDepartement($_POST['UUID']);
$allergies = execRequest::getAllergies($_POST['UUID']);
$a_medicaux = execRequest::getAntecedentMedicaux($_POST['UUID']);
$a_chirurgicaux = execRequest::getAntecedentChirurgicaux($_POST['UUID']);

if(isset($_POST['hosp'])) {
	$actes = execRequest::getActes($_POST['UUID'],$_POST['hosp']);
}
$const = execRequest::getConst();
require('../vue/consultation_patient.php');
?>
