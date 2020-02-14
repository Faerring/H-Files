<?php
require('connexion.php');
require('utilisateur.php');
require('encapsulation.php');
$noeud = $_SESSION['user']->getIDNoeud();
$nomPers = $_SESSION['user']->getNom();

function getEntrees() {
	$x = 'SELECT DISTINCT dmp_patient.nom, dmp_patient.prenom, DateAffec, medecintraitant.nom FROM personnel, medecintraitant, dmp_patient NATURAL JOIN hospitalisation NATURAL JOIN affectation 
WHERE (dmp_patient.IDNoeud = '.$noeud.') AND (personnel.nom = '.$nomPers.') AND (affectation.DateAffec IN (SELECT DateAffec FROM affectation WHERE DateAffec >= (SELECT DATE_SUB(NOW(), INTERVAL 7 DAY)))) 
AND (medecintraitant.IDMedTraitant = dmp_patient.IDMedTraitant)';
	$result = $dbh->query($x);
	return $result;
}

function getSorties() {
	$x = 'SELECT DISTINCT dmp_patient.nom, dmp_patient.prenom, DateFinAffec, medecintraitant.nom FROM personnel, medecintraitant, dmp_patient NATURAL JOIN hospitalisation NATURAL JOIN affectation 
WHERE (dmp_patient.IDNoeud = '.$noeud.') AND (personnel.nom '.$nomPers.') AND (affectation.DateFinAffec IN (SELECT DateFinAffec FROM affectation WHERE DateFinAffec >= (SELECT DATE_SUB(NOW(), INTERVAL 7 DAY))))
AND (medecintraitant.IDMedTraitant = dmp_patient.IDMedTraitant)';
	$result = $dbh->query($x);
	return $result;
}

function addAffectattion(){
	if(isset($_POST['confirmerA'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$date = $_POST['date'];
		
		$result = execRequest::requestAdd($nom,$prenom,$date);
		if ($result->rowCount() != 0)
			echo "L'affectation a bien été ajoutée";
			return $result;
		}
		echo "L'affectation n'a pas été ajoutée";
		return False;
}

function updateAffectattion(){
	if(isset($_POST['confirmerM'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$date = $_POST['date'];
		
		$result = execRequest::requestUpdate($nom,$prenom,$date);
		if ($result->rowCount() != 0)
			echo "L'affectation a été modifiée";
			return $result;
		}
		echo "L'affectation n'a pas été modifiée";
		return False;
}
?>
