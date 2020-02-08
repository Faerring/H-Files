<?php
require('../modele/entrees_sorties.php');
require('../modele/loginpage.php');
$entrees = getEntrees();
$sorties = getSorties();
require('../vue/entrees_sorties.php');
?>
