<?php
function disconnect() {
	session_start();

	session_unset();

	session_destroy();

	header('Location: loginpage.php');
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
	require('connexionBDD.php');
	if((isConnectedToDB() == true) && ((isset($_POST['IDWeb']) && $_POST['IDWeb']!="")  && (isset($_POST['mdp']) && $_POST['mdp']!=""))) {
		$y = "SELECT IDWeb, mdp FROM personnel";
		$result =$dbh->query($y);
		$IDWeb = $_POST('IDWeb');
		$mdp = $_POST('mdp');
		session_start();
		while($ligne=$result->fetch()) {
			if (($login == $ligne[0]) && ($mdp == $ligne[1])){
				$_SESSION['IDWeb'] = $IDWeb;
				$_SESSION['mdp'] = $mdp;         	
			}
		}
		
		require('Encapsulation.php');
		$execRequest = new execRequest();
		require('user.php');
		$user = new user($IDWeb);	
		
		$_SESSION['execRequest'] = $execRequest;
		$_SESSION['user'] = $user;
		
		return isConnected();
	}
	return false;
}
?>
