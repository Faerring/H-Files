<?php
require('connexion.php');
function getEntrees() {
	$x = 'SELECT DISTINCT dmp_patient.nom, dmp_patient.prenom, DateAffec FROM personnel, dmp_patient NATURAL JOIN hospitalisation NATURAL JOIN affectation 
WHERE (dmp_patient.IDNoeud = personnel.IDNoeud) AND (personnel.nom LIKE "Pical") AND (affectation.DateAffec IN (SELECT DateAffec FROM affectation WHERE DateAffec >= (SELECT DATE_SUB(NOW(), INTERVAL 7 DAY))))';
	$result = $dbh->query($x);
	return $result;
}

function getSorties() {
	$x = 'SELECT DISTINCT dmp_patient.nom, dmp_patient.prenom, DateFinAffec FROM personnel, dmp_patient NATURAL JOIN hospitalisation NATURAL JOIN affectation 
WHERE (dmp_patient.IDNoeud = personnel.IDNoeud) AND (personnel.nom LIKE "Pical") AND (affectation.DateFinAffec IN (SELECT DateFinAffec FROM affectation WHERE DateFinAffec >= (SELECT DATE_SUB(NOW(), INTERVAL 7 DAY))))';
	$result = $dbh->query($x);
	return $result;
}

function addAffectattion(){
	if(isset($_POST['confirmerA'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$date = $_POST['date'];
		
		$x = 'INSERT INTO affectation VALUES("",NULL,'.$date.',(SELECT IDNoeud FROM personnel WHERE nom LIKE "Pical"),(SELECT IDHosp FROM hospitalisation NATURAL JOIN dmp_patient WHERE nom LIKE '.$nom.' AND prenom LIKE '.$prenom.'))';
		$result = $dbh->query($x);
		if ($result->rowCount() != 0)
			return $result;
		}
		return False;
}

function updateAffectattion(){
	if(isset($_POST['confirmerM'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$date = $_POST['date'];
		
		$x = 'SELECT IDAffec FROM affectation NATURAL JOIN hospitalisation NATURAL JOIN dmp_patient WHERE UUID = (SELECT UUID from dmp_patient WHERE nom LIKE '.$nom.' AND prenom LIKE '.$prenom.') AND DateFinAffec IS NULL';
		$result = $dbh->query($x);
		$y = 'UPDATE affectation SET DateFinAffec = '.$date.' WHERE IDAffec = '.$result;
		$result2 = $dbh->query($y);
		if ($result2->rowCount() != 0)
			return $result2;
		}
		return False;
}
?>
