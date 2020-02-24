<?php
require('../modele/entrees_sorties.php');
require('../modele/loginpage.php');
$entrees = execRequest::getEntrees($dbh);
$sorties = execRequest::getSorties($dbh);
require('../vue/entrees_sorties.php');
?>
