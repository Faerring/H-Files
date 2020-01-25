<?php
function disconnect() {
	if(isset$_GET['dc']) {
		session_start();

		session_unset();

		session_destroy();
	}
}
function isConnected() {
	if(isset($_SESSION['IDWeb']) && isset($_SESSION['mdp']) && isset($_SESSION['execRequest']) && isset($_SESSION['user'])) {
		return true;
	}
	else {
		return false;
	}
}
function connexion() {
	$test = false;
	require('connexionBDD.php');
	if(isset($_POST['submit']) && (isConnectedToDB() == true) && ((isset($_POST['IDWeb']) && $_POST['IDWeb']!="")  && (isset($_POST['mdp']) && $_POST['mdp']!=""))) {
		$y = "SELECT IDWeb, mdp FROM personnel";
		$result = $dbh->query($y);
		$IDWeb = $_POST('IDWeb');
		$mdp = $_POST('mdp');
		session_start();
		while($ligne=$result->fetch()) {
			if (($login == $ligne[0]) && ($mdp == $ligne[1])){
				$_SESSION['IDWeb'] = $IDWeb;
				$_SESSION['mdp'] = $mdp;
				if(isset($_SESSION['IDWeb'])) {
					require('Encapsulation.php');
					$execRequest = new execRequest();
					require('user.php');
					$user = new user($IDWeb);	
					
					$_SESSION['execRequest'] = $execRequest;
					$_SESSION['user'] = $user;
				}
				$a = true;         	
			}
		}
		if ($a==true){
			header('Location: accueil.php');
		}
		return isConnected();
	}
	if(isset($_POST['submit'])) {
		echo 'window.alert("Identifiant ou mot de passe incorrect")';
		header("refresh:1;url=../controleur/loginpage.php"); 
	}
	return false;
}
?>
