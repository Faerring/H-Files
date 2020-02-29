<?php
function addAffectation($dbh,$nomPers,$noeud){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date = $_POST['date'];
	$time = $_POST['temps'];
	
	$patient = execRequest::findPatient($nom,$prenom,$dbh);
	if ($patient != false) {
		$result = execRequest::requestAdd($nom,$prenom,$date,$time,$dbh,$nomPers,$noeud);
		if ($result->rowCount() != 0) {
			return $result;
		}
	}
	return False;
}

function updateAffectation($dbh){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date = $_POST['date'];
	$time = $_POST['temps'];
	
	$patient = execRequest::findPatient($nom,$prenom,$dbh);
	if ($patient != false) {
		$result = execRequest::requestUpdate($nom,$prenom,$date,$time,$dbh);
		if ($result != NULL) {
			if ($result->rowCount() != 0) {
				return $result;
			}
		}
	}
	return False;
}
?>
