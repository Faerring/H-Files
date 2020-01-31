<?php
function getEntrees() {
	$x = "SELECT dmp_patient.nom, dmp_patient.prenom, dateAffec FROM personnel, dmp_patient NATURAL JOIN hospitalisation NATURAL JOIN affectation WHERE dmp_patient.IDNoeud = personnel.IDNoeud AND personnel.nom LIKE 'Pical'";
	$result = $dbh->query($x);
	return $result;
}

function getSorties() {
	$x = "SELECT dmp_patient.nom, dmp_patient.prenom, dateFinAffec FROM personnel, dmp_patient NATURAL JOIN hospitalisation NATURAL JOIN affectation WHERE dmp_patient.IDNoeud = personnel.IDNoeud AND personnel.nom LIKE 'Pical'";
	$result = $dbh->query($x);
	return $result;
}
?>
