<?php
  include("connexion.php");
  include('parametres.php');

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
      while ($row=$req->fetch()) {
        echo "<br>id : ".$row[0].", nom : ".$row[1];
      }
    }

   ?>

</body>
</html>
