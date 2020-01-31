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
		$y = 'UPDATE affectation SET DateFinAffec = "2020-01-31" WHERE IDAffec = '.$result;
		$result2 = $dbh->query($y);
		if ($result2->rowCount() != 0)
			return $result2;
		}
		return False;
}
?>
