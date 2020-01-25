<?php 
function active($current_page){
  $url = basename($_SERVER['PHP_SELF']);
  if($current_page == $url){
      echo 'active'; //class name in css
  }
}
function navbarMed() {
	echo '
					<li class="'.active("profil.php").'"><a href="../controleur/profil.php">Profil</a></li>
					<li class="'.active("dmp.php").'"><a href="../controleur/dmp.php">Patients</a></li>
					<li class="'.active("contact.php").'"><a href="../controleur/contact.php">Qui sommes nous ?</a></li>
	';
}
function navbarAdmin() {
	echo '
					<li class="'.active("profil.php").'"><a href="../controleur/profil.php">Profil</a></li>
					<li class="'.active("personnel.php").'"><a href="../controleur/personnel.php">Personnels</a></li>
					<li class="'.active("noeuds.php").'"><a href="../controleur/noeuds.php">Noeuds</a></li>
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
					  <li><a href="profil.php"><span class="glyphicon glyphicon-user"></span> '.getNom().' '.getPrenom().'</a></li>
					  <li><a href="../vue/loginpage.php?dc=true"><span class="glyphicon glyphicon-log-in"></span> Se déconnecter</a></li>
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
					  <li><a href="profil.php"><span class="glyphicon glyphicon-user"></span> Inconnu(e)</a></li>
					  <li><a href="../vue/loginpage.php?dc=true"><span class="glyphicon glyphicon-log-in"></span> Se déconnecter</a></li>
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
	}
	else {
		echo '
						<li class="'.active("profil.php").'"><a href="../controleur/profil.php">Profil</a></li>
						<li class="'.active("contact.php").'"><a href="../controleur/contact.php">Qui sommes nous ?</a></li>
		';
	}
	navGenBottom();
}
?>
