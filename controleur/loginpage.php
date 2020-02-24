<?php
require('../modele/encapsulation.php');
require('../modele/utilisateur.php');
require('../modele/connexion.php');
session_start();
require('../modele/loginpage.php');
$testCo = connexion($dbh);
if(!$testCo && isset($_POST['submit'])) {
	exit(0);
}
require('../vue/loginpage.php');
?>
