<?php
function addAffectation($dbh,$nomPers,$noeud){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date = $_POST['date'];
	
	$result = execRequest::requestAdd($nom,$prenom,$date,$dbh,$nomPers,$noeud);
	if ($result->rowCount() != 0) {
		return $result;
	}
	return False;
}

function updateAffectation($dbh){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date = $_POST['date'];
	
	$result = execRequest::requestUpdate($nom,$prenom,$date,$dbh);
	if ($result->rowCount() != 0) {
		return $result;
	}
	return False;
}
?>
