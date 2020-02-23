<?php
require('../modele/connexion.php');
require('../modele/encapsulation.php');

$hospitalisation = execRequest::getHospitalisation("79567957957959757952791371257425",$dbh);
$donneesP = execRequest::viewPData("79567957957959757952791371257425",$dbh);
$depH = execRequest::getDepartement("79567957957959757952791371257425",$dbh);
$MedecinTraitant = execRequest::getMedecinTraitant("79567957957959757952791371257425",$dbh);
$allergies = execRequest::getAllergies("79567957957959757952791371257425",$dbh);
$a_medicaux = execRequest::getAntecedentMedicaux("79567957957959757952791371257425",$dbh);
$a_chirurgicaux = execRequest::getAntecedentChirurgicaux("79567957957959757952791371257425",$dbh);

if(isset($_POST['hosp'])) {
	$actes = execRequest::getActes($_POST['UUID'],$_POST['hosp']);
}
$const = execRequest::getConst("79567957957959757952791371257425",$dbh)->fetch();
require('../vue/consultation_patient.php');
?>
