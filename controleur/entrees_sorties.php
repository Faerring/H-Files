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
	addAffectation($dbh,$nomPers);
}
if (isset($_POST['confirmerM'])) {
	updateAffectation($dbh);
}
$entrees = execRequest::getEntrees($dbh,$noeud,$nomPers);
$sorties = execRequest::getSorties($dbh,$noeud,$nomPers);
require('../vue/entrees_sorties.php');
?>
