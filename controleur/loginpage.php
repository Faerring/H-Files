<?php
require('../modele/encapsulation.php');
require('../modele/utilisateur.php');
require('../modele/connexion.php');
require('../modele/loginpage.php');
connexion($dbh);
require('../vue/loginpage.php');
?>
