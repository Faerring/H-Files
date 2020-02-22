<?php

session_start();

//empeêcher l'accès à la page sans s'être authentifié
if (!(isset($_SESSION["user"]))){
    echo "<script language='javascript'>alert('Bien tenté.');</script>";
    header("refresh:0;url=indexsteam.php");
}
//On détruit la session
session_unset();

session_destroy();

//On redirige l'utilisateur vers la page de connexion
header('Location: ../controleur/loginpage.php');

?>
