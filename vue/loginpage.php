<?php
require("SqueletteDePage.php");
debSquelette();
?>
				<div class="row row-eq-height align_row">
					<div class="col-12 col-lg-5 logindiv" id="login-colL">
						<div class="row"> 
							<h2 class="loginTitle">Le projet H-Files, qu'est ce que c'est ?</h2>
						</div>
						<div class="row"> 
							<p class="loginText">Notre application H-Files a pour but de permettre la récupération de dossiers pré-existant (qu'ils soient au format papier ou numérique). Les transfert de dossiers entre hôpitaux ainsi que la bonne gestion et l'archivage du dossier médical d'un patient tout en respectant les contraintes de confidentialité propre aux hôpitaux, de son entrée à sa sortie de l'hôpital de manière sécurisée.</p>
						</div>
					</div>
					<div class="col-12 col-lg-5 col-lg-offset-2 logindiv" id="login-colR">
						<div class="row">
							<h2 class="loginTitle">SE CONNECTER</h2>
						</div>
						<img class="img-login" typeof="foaf:Image" src="../img/aphp-logo-blue.png">
						<div class="row" id="login-form">
							<form method="post" action="../controleur/loginpage.php">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Identifiant" name="IDWeb" size="40" required="">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Mot de passe" name="mdp" size="40" required="">
									<a href="../vue/mdpoublie.php"><p>Mot de passe oublié ?</p></a>
								</div>
								<div class="form-group" id="formSubmit">
									<input name="submit" class="btnSubmit" type="submit" value="Se connecter">
								</div>
							</form>
						</div>	
					</div>
				</div>
<?php
finSquelette();
?>
