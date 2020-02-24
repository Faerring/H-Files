<?php
  require('connexion.php');

  function addDocStruct($id, $target_file, $idActe, $fileType, $dbh) {
    $fileExtension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if ($fileExtension == "xml") {
      if ($dbh != false) {
        $q = "INSERT INTO document (IDDocu, NomDocu, IDActe) VALUES ($id, $target_file, $idActe)";
        $req = $dbh -> query($q);
        if ($req == true) {
          $q = "INSERT INTO structure (IDDocu, type) VALUES ($id, $fileType)";
          $req = $dbh -> query($q);
          if ($req == false) return false;
          return;
        }
      } else {
        echo("<br>Connexion failed!");
      }
    }
    return false;
  }

  function addImageMedical($id, $target_file, $idActe, $type_img, $dbh) {
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if ($fileType == "jpg" || $fileType == "jpeg" || $fileType == "png") {
      if ($dbh != false) {
        $q = "INSERT INTO document (IDDocu, NomDocu, IDActe) VALUES ($id, $target_file, $idActe)";
        $req = $dbh -> query($q);
        if ($req == true) {
          $q = "INSERT INTO brut (IDDocu, type) VALUES ($id, $type_img)";
          $req = $dbh -> query($q);
          if ($req == false) return false;
          return;
        }
      } else {
        echo("<br>Connexion failed!");
      }
    }
    return false;
  }

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $fileExtension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Desole, ce fichier existe deja.";
      $uploadOk = 0;
  }

  // Allow certain file formats
  if($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg" && $fileExtension != "xml") {
      echo "Desole, seulement les fichiers JPG, JPEG, PNG & XML  sont autorises.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Votre fichier n'a pas ete mis en ligne.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["name"], $target_file)) {
        var_dump($target_file);
        $q = "SELECT MAX(IDDocu) FROM document";
        $res = $dbh -> query($q);
        $id = ($res -> fetch())+1;

        $fileType = $_POST['fileType'];
        var_dump($fileType);
        if ($fileType == 'ordonnance' || $fileType == 'demande_examen' || $fileType == 'diagnostic') {
          addDocStruct($id, $target_file, 1, $fileType, $dbh);
        } else {
          addImageMedical($id, $target_file, 2, $fileType, $dbh);
        }

        echo "Le fichier ". basename( $_FILES["fileToUpload"]["name"]). " a ete mis en ligne.";
      } else {
          echo "Desole, il y a eu une erreur lors de l'upload de votre fichier.";
      }
  }

?>
