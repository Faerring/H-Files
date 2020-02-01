<?php
require('../modele/entrees_sorties.php');
$entrees = getEntrees();
$sorties = getSorties();
require('../vue/entrees_sorties.php');
?>
