<?php
include("connexion.php");
include('parametres.php');
global $dbh = connectToDB($host, $user, $pwd, $db);

function isParent($parentNode, $childNode) {
  if ($dbh != false) {
    $req = $dbh -> query("SELECT IDNoeud FROM Noeud WHERE IDNoeud=$childNode;");
  }
  if(count($req) == 0) {
    var_dump($req);
    echo("The child node ID isn't in the database!");
    return false;
  }
  $row=$req->fetch();
  if ($parentNode == $childNode) {
    return true;
  }
  $niveau = $row[2];
  if ($niveau == 0) {
    return false;
  } else {
    $conteneur = $row[3];
    return (isParent($parentNode, $conteneur));
  }
}

function attachToNode($ID, $profession, $login, $mdp, $nom, $prenom, $mail, $tel, $node) {
  if ($dbh != false) {
    $req = $dbh -> query("INSERT INTO Personnel VALUES($ID, $profession, $login, $mdp, $nom, $prenom, $mail, $node);");
    if ($req == true) {
      return true;
    } else {
      return false;
    }
  }
}

?>
