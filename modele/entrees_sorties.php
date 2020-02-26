<?php
function addAffectation($dbh,$nomPers){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date = $_POST['date'];
	
	$result = execRequest::requestAdd($nom,$prenom,$date,$dbh,$nomPers);
	if ($result->rowCount() != 0) {
		echo "L'affectation a bien été ajoutée";
		return $result;
	}
	echo "L'affectation n'a pas été ajoutée";
	return False;
}

function updateAffectation($dbh){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date = $_POST['date'];
	
	$result = execRequest::requestUpdate($nom,$prenom,$date,$dbh);
	if ($result->rowCount() != 0) {
		echo "L'affectation a été modifiée";
		return $result;
	}
	echo "L'affectation n'a pas été modifiée";
	return False;
}
?>
