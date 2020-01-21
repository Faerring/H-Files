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
					<li class="'.active("agenda.php").'"><a href="../controleur/agenda.php">Agenda</a></li>
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
		<nav class="navbar navbar-fixed-top">
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
	echo '
				</ul>
				<ul class="nav navbar-nav navbar-right">
				  <li><a href="profil.php"><span class="glyphicon glyphicon-user"></span> D.SAUCET Nathan</a></li>
				</ul>
			</div>
		  </div>
		</nav>
	';
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
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="UTF-8" lang="fr">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>H-Files</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="https://www.aphp.fr/sites/default/files/favico.png" type="image/png" />
        <link rel="stylesheet" type="text/css" href="../CSS/nathan_style.css"/>
	</head>
	<body>
		<?php 
			viewNavBar();
		?>
	</body>
</html>
