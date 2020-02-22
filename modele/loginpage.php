<?php
function disconnect() {
	if(isset($_GET['dc'])) {
		session_start();

		session_unset();

		session_destroy();
	}
}
function isConnected() {
	if(isset($_SESSION['IDWeb']) && isset($_SESSION['mdp']) && isset($_SESSION['user'])) {
		return true;
	}
	else {
		return false;
	}
}
function connexion($dbh) {
	if(isset($_POST['submit']) && isset($dbh) && ((isset($_POST['IDWeb']) && $_POST['IDWeb']!="")  && (isset($_POST['mdp']) && $_POST['mdp']!=""))) {
		$result = execRequest::getLogin($dbh);
		$IDWeb = $_POST['IDWeb'];
		$mdp = $_POST['mdp'];
		session_start();
		while($ligne=$result->fetch()) {
			if (($IDWeb == $ligne[0]) && ($mdp == $ligne[1])){
				$_SESSION['IDWeb'] = $IDWeb;
				$_SESSION['mdp'] = $mdp;
				if(isset($_SESSION['IDWeb'])) {
					$user = new Utilisateur();
					$user->initializeUser($IDWeb);
					$_SESSION['user'] = $user;
				}
				$a = true;         	
			}
		}
		if ($a==true){
			header('Location: contact.php');
		}
		else {
		        echo "<script language='javascript'>alert('Identifiant ou mot de passe incorrect');</script>";
				header("refresh:0;url=../controleur/loginpage.php"); 
		}
		return isConnected();
	}
	if(isset($_POST['submit'])) {
        echo "<script language='javascript'>alert('Identifiant ou mot de passe incorrect');</script>";
        header("refresh:0;url=../controleur/loginpage.php"); 
	}
	return false;
}
?>
