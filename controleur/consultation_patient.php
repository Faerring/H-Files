<?php
require('../modele/connexion.php');
require('../modele/encapsulation.php');

$hospitalisation = execRequest::getHospitalisation("79567957957959757952791371257425");
$donneesP = execRequest::viewPData("79567957957959757952791371257425");
$depH = execRequest::getDepartement("79567957957959757952791371257425");
$MedecinTraitant = execRequest::getMedecinTraitant("79567957957959757952791371257425");
$allergies = execRequest::getAllergies("79567957957959757952791371257425");
$a_medicaux = execRequest::getAntecedentMedicaux("79567957957959757952791371257425");
$a_chirurgicaux = execRequest::getAntecedentChirurgicaux("79567957957959757952791371257425");

if(isset($_POST['hosp'])) {
	$actes = execRequest::getActes($_POST['UUID'],$_POST['hosp']);
}
$const = execRequest::getConst();
require('../vue/consultation_patient.php');
?>
