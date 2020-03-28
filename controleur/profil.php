<?php
include("../vue/SqueletteDePage.php");
include("../modele/utilisateur.php");
require('../modele/encapsulation.php');
require('../modele/connexion.php');
session_start();
//empêcher l'accès à la page sans s'être authentifié
if (!(isset($_SESSION['user']))){
    echo "<script language='javascript'>alert('Bien tenté.');</script>";
    header("refresh:0;url=../controleur/loginpage.php");
}
$utilisateur = $_SESSION['user'];
debSquelette();

?>

<div class="row">
  <div class="col-lg-offset-3 col-sm-6"><h3><strong>Profil</strong></h3>
    <div class = "col-lg-6" style = "border : none">
        <ul class="list-group" style = "list-style : none; text-align :left;font-size:18px;">
          <?php
          echo "<li>Nom : ".$utilisateur->getNom()."</li>";
          echo "<li>Pr&eacute;nom : ".$utilisateur->getPrenom()."</li>";
          echo "<li>Num&eacute;ro de t&eacute;l&eacute;phone : ".$utilisateur->getTel()."</li>";
          echo "<li>Mail :".$utilisateur->getMail()." </li>";
          ?>
        </ul>
    </div>


    <div class = " col-lg-6" style = "border : none">
      <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-square img-thumbnail" alt="avatar">

        <ul class="list-group" style = "list-style : none;font-size:18px;">
          <?php
          echo "<li>Profession :".$utilisateur->getProfession()." </li>";
          echo "<li>Service : </li>";
          echo "<li>Unit&eacute; : </li>";
          ?>
        </ul>

        <a class="btn btn-primary" href="#" role="button">Retour</a>
        <a class="btn btn-primary" href="../vue/modifPageUser.php" role="button">Modifier</a>

    </div>

  </div>
</div>




<?php
finSquelette();
 ?>
