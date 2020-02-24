<?php
  require("SqueletteDePage.php");
  debSquelette();

?>

<form action="../modele/modif_dmp.php" method="post" enctype="multipart/form-data">
    Selectionner le fichier que vous souhaitez mettre en ligne :
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Enregistrer" name="submit"><br>
    <input type="radio" name="fileType" value="ordonnance">Ordonnance<br>
    <input type="radio" name="fileType" value="diagnostic">Diagnostic<br>
    <input type="radio" name="fileType" value="demande_examen">Demande d'examen<br>
    <input type="radio" name="fileType" value="IRM">IRM<br>
    <input type="radio" name="fileType" value="ECG">ECG<br>
    <input type="radio" name="fileType" value="Radio">Radio<br>
</form>

<?php
finSquelette();
?>
