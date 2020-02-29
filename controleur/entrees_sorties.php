<?php
require('../modele/encapsulation.php');
require('../modele/utilisateur.php');
require('../modele/connexion.php');
session_start();
require('../modele/entrees_sorties.php');
//empêcher l'accès à la page sans s'être authentifié
if (!(isset($_SESSION['user']))){
    echo "<script language='javascript'>alert('Bien tenté.');</script>";
    header("refresh:0;url=../controleur/loginpage.php");
}
$noeud = $_SESSION['user']->getIDNoeud();
$nomPers = $_SESSION['user']->getNom();

if (isset($_POST['confirmerA'])) {
	$affectation = addAffectation($dbh,$nomPers,$noeud);
	if ($affectation == False) {
		echo "<script language='javascript'>alert('Erreur, veuillez réessayer');</script>";
	}
	else {
		echo "<script language='javascript'>alert('Une affectation a bien été ajoutée');</script>";
	}
}
if (isset($_POST['confirmerM'])) {
	$update = updateAffectation($dbh);
	if ($update == False) {
		echo "<script language='javascript'>alert('Erreur, veuillez réessayer');</script>";
	}
	else {
		echo "<script language='javascript'>alert('Une affectation a bien été modifiée');</script>";
	}
}
$entrees = execRequest::getEntrees($dbh,$noeud,$nomPers);
$sorties = execRequest::getSorties($dbh,$noeud,$nomPers);
require('../vue/entrees_sorties.php');
?>
