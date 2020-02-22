<?php 
function active($current_page){
  $url = basename($_SERVER['PHP_SELF']);
  if($current_page == $url){
      return 'active'; //class name in css
  }
}
function navbarMed() {
	echo '
					<li class="'.active("profil.php").'"><a href="../controleur/profil.php">Profil</a></li>
					<li class="'.active("dmp.php").'"><a href="../controleur/dmp.php">Patients</a></li>
					<li class="'.active("contact.php").'"><a href="../controleur/contact.php">Qui sommes nous ?</a></li>
	';
}
function navbarInf() {
	echo '
					<li class="'.active("profil.php").'"><a href="../controleur/profil.php">Profil</a></li>
					<li class="'.active("dmp.php").'"><a href="../controleur/dmp.php">Patients</a></li>
					<li class="'.active("entreesortie.php").'"><a href="../controleur/entreesortie.php">Entrées/Sorties</a></li>
					<li class="'.active("contact.php").'"><a href="../controleur/contact.php">Qui sommes nous ?</a></li>
	';
}
function navbarAdmin() {
	echo '
					<li class="'.active("profil.php").'"><a href="../controleur/profil.php">Profil</a></li>
					<li class="'.active("personnel.php").'"><a href="../controleur/personnel.php">Personnels</a></li>
					<li class="'.active("noeuds.php").'"><a href="../controleur/noeuds.php">Noeuds</a></li>
					<li class="'.active("contact.php").'"><a href="../controleur/contact.php">Qui sommes nous ?</a></li>
	';
}
function navbarSec() {
	echo '
					<li class="'.active("profil.php").'"><a href="../controleur/profil.php">Profil</a></li>
					<li class="'.active("enregistrement.php").'"><a href="../controleur/enregistrement.php">Enregistrement Patients</a></li>
					<li class="'.active("contact.php").'"><a href="../controleur/contact.php">Qui sommes nous ?</a></li>
	';
}
function navbarDefault() {
	echo '
					<li class="'.active("contact.php").'"><a href="../controleur/contact.php">Qui sommes nous ?</a></li>
	';
}
function navGenTop() {
	echo '
		<nav class="navbar navbar-fixed-top" id="navbar">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			  </button>
			  <img class="navbar-brand img-brand" typeof="foaf:Image" src="../img/aphp-logo-blue.png">
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
	';
}

function navGenBottom() {
	if(isset($_SESSION['user'])) {
		echo '
					</ul>
					<ul class="nav navbar-nav navbar-right">
					  <li><a href="../controleur/profil.php"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['user']->getNom().' '.$_SESSION['user']->getPrenom().' </a></li>
					  <li><a href="../modele/logout.php"><span class="glyphicon glyphicon-log-out"></span> Se déconnecter</a></li>
					</ul>
				</div>
			  </div>
			</nav>
		';
	}
	else {
		echo '
					</ul>
					<ul class="nav navbar-nav navbar-right">
					  <li><a href="../controleur/loginpage.php"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>
					</ul>
				</div>
			  </div>
			</nav>
		';
	}
}
function viewNavBar(){
	navGenTop();	
	if(isset($_SESSION['user'])) {
		
		if($_SESSION['user']->getProfession() == "Administrateur") {
			navbarAdmin();
		}
		if($_SESSION['user']->getProfession() == "Medecin") {
			navbarMed();
		}
		if($_SESSION['user']->getProfession() == "Infirmier") {
			navbarInf();
		}
		if($_SESSION['user']->getProfession() == "Secrétaire") {
			navbarSec();
		}
		if($_SESSION['user']->getProfession() != ("Secrétaire" || "Medecin" || "Infirmier" || "Administrateur")) {
			navbarDefault();
		}
	}
	else {
		echo '
						<li class="'.active("contact.php").'"><a href="../controleur/contact.php">Qui sommes nous ?</a></li>
		';
	}
	navGenBottom();
}
?>
