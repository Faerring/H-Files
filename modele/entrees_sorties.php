<?php
function addAffectation($dbh,$nomPers,$noeud){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date = $_POST['date'];
	
	$patient = execRequest::findPatient($nom,$prenom,$dbh);
	if ($patient != false) {
		$result = execRequest::requestAdd($nom,$prenom,$date,$dbh,$nomPers,$noeud);
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
	
	$patient = execRequest::findPatient($nom,$prenom,$dbh);
	if ($patient != false) {
		$result = execRequest::requestUpdate($nom,$prenom,$date,$dbh);
		if ($result->rowCount() != 0) {
			return $result;
		}
	}
	return False;
}
?>
