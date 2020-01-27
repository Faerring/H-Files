<?php
  include("connexion.php");

  $host="sqletud.u-pem.fr";
  $user="lschneid";
  $pwd="cN9zRX";

  $db="lschneid_db";

  $dbh = connectToDB($host, $user, $pwd, $db);
  if ($dbh != false) {
    echo ("<br>Successful connexion!");
    $req = $dbh -> query("SELECT ID_PROF, nom_prof FROM professeur;");
  } else {
    echo("<br>Connexion failed!");
  }
 ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>connection test DB</title>
  <meta name="author" content="Test">
</head>
<body>
  <?php
    if (isset($req)) {
      while ($ligne=$req->fetch()) {
        echo "<br>id : ".$ligne[0].", nom : ".$ligne[1];
      }
    }

   ?>

</body>
</html>
