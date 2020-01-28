<?php
require('parametres.php');
  function connectToDB($host, $user, $pwd, $db) {
    try{
      $con='mysql:host='.$host.';dbname='.$db;
      $dbh = new PDO($con,$user,$pwd,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      return $dbh;
    }
    catch(Exception $e){
      echo('La connexion à la base de données a échoué !');
      return false;
    }
  }

  global $dbh = connectToDB($host, $user, $pwd, $db);
?>
