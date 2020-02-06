<?php
include("../modele/utilisateur.php");
$user = new Utilisateur;
$newMail = $_POST['mail'];
$newTel = $_POST['tel'];

$user->setMail($newMail);
$user->setMobilePhone($newTel);






 ?>
