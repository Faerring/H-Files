<?php
function addAffectation($dbh,$nomPers){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date = $_POST['date'];
	
	$result = execRequest::requestAdd($nom,$prenom,$date,$dbh,$nomPers);
	if ($result->rowCount() != 0) {
		echo "<script language='javascript'>alert('L'affectation a bien été ajoutée');</script>";
		return $result;
	}
	echo "<script language='javascript'>alert('L'affectation n'a pas été ajoutée');</script>";
	return False;
}

function updateAffectation($dbh){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date = $_POST['date'];
	
	$result = execRequest::requestUpdate($nom,$prenom,$date,$dbh);
	if ($result->rowCount() != 0) {
		echo "<script language='javascript'>alert('L'affectation a bien été modifiée');</script>";
		return $result;
	}
	echo "<script language='javascript'>alert('L'affectation n'a pas été modifée');</script>";
	return False;
}
?>
