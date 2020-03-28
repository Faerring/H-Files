<?php
include("../vue/SqueletteDePage.php");
include("../modele/utilisateur.php");
require('../modele/connexion.php');
session_start();
//empêcher l'accès à la page sans s'être authentifié
if (!(isset($_SESSION['user']))){
    echo "<script language='javascript'>alert('Bien tenté.');</script>";
    header("refresh:0;url=../controleur/loginpage.php");
}
$user = $_SESSION['user'];
debSquelette();
if ($_POST['tel'] != ""){
    $newTel = $_POST['tel'];
    $user->setMobilePhone($newTel,$dbh);
    echo "Modification du téléphone enregistrée";
}

if ($_POST['mail'] != ""){
    $newMail = $_POST['mail'];
    $user->setMail($newMail,$dbh);
    echo "Modification du mail enregistrée";
}







 ?>
