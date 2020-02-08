<?php
require('../modele/connexion.php');
require('../modele/consultation_patient.php');
$hospitalisation = getHospitalisation($_SESSION['user']->getUUID());
if(isset($_POST['hosp'])) {
	$actes = getActes($_SESSION['user']->getUUID(),$_POST['hosp']);
}
require('../vue/consultation_patient.php');
?>
