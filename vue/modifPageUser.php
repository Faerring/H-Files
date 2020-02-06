<?php
include("SqueletteDePage.php");
debSquelette();
include("../modele/utilisateur.php");
$utilisateur = new Utilisateur;
//$utilisateur->initializeUser();
?>

<div class="row">
  <div class="col-lg-offset-3 col-sm-6">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#menu1">Données générales</a></li>
      <li><a data-toggle="tab" href="#menu2">Mot de passe</a></li>
    </ul>

    <div class="tab-content">
      <div id="menu1" class="tab-pane fade in active">
        <div class = "col-lg-6" style = "border : none">
            <ul class="list-group" style = "list-style : none; text-align :left;font-size:18px;">
              <?php
              echo "<li>Nom : ".$utilisateur->getNom()."</li>";
              echo "<li>Pr&eacute;nom : ".$utilisateur->getPrenom()."</li>";
              echo "<li>Date de naissance : </li>";
              echo "<li>Adresse : </li>";
              echo "<li>Code postal : </li>";
              echo "<li>Ville : </li>";
              ?>
              <form action="../controleur/modifUser.php" method="post">
                <li>Num&eacute;ro de t&eacute;l&eacute;phone :</li><input type="text" class="form-control" placeholder="Entrez nouveau tel" name="tel" />
                <li>Mail : </li><input type="text" class="form-control" placeholder="Entrez nouveau mail" name="mail" />
                <input type="submit" class="btn btn-primary" value="Confirmer">
                <input type="reset" class="btn btn-primary" value="Annuler" onclick="history.back()">
              </form>

            </ul>
        </div>


        <div class = " col-lg-6" style = "border : none">
          <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-square img-thumbnail" alt="avatar">

            <ul class="list-group" style = "list-style : none;font-size:18px;">
              <?php
              echo "<li>Profession :".$utilisateur->getProfession()." </li>";
              echo "<li>Service : </li>";
              echo "<li>Unit&eacute; : </li>";
              echo "<li>Num&eacute;ro fixe : </li>";
              ?>
            </ul>

        </div>
      </div>
      <div id="menu2" class="tab-pane fade">
        <h3>Menu 2</h3>
        <p>Some content.</p>
      </div>
    </div>
  </div>
</div>


<?php
finSquelette();
 ?>
