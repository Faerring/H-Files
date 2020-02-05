<?php
require("SqueletteDePage.php");
debSquelette();
require("../modele/connexion.php");
require("../modele/utilisateur.php");

if(isset($_POST["nMdp"])){
  if (!empty($_POST["nMdp"])) {
    if($_POST["nMdp"] == $_POST["nMdp2"]){
      $id = getID();
      $dbh->query("UPDATE Personnel SET motDePasse=SHA1(\"".$_POST["nMdp"]."\");");
      header("location: index.php?nMdp=true");
    } else{
      $error=true;
    }
  } else{
    $error=true;
  }
}
?>
				<div id="newPWDcontainer">
          <div class="newPasswdForm" id="newPasswdForm">
						<h2 class="loginTitle">Réinitialisation du mot de Passe</h2>
						<img class="img-login" typeof="foaf:Image" src="../img/aphp-logo-blue.png" style="margin-bottom:70px">

            <form class="" method="post">
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Nouveau Mot de Passe" name="nMdp" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Verifier Mot de Passe" name="nMdp2" required>
              </div>
              <div class="form-group" id="formSubmit">
                <input name="submit" class="btnSubmit" type="submit" value="Envoyer">
              </div>
            </form>
					</div>
				</div>
<?php
finSquelette();
?>
