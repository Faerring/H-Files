<?php

function printActe($id)
{
  require("connexion.php");
  $sql = "SELECT IDActe,nomActe,dateActe,type FROM acte WHERE IDPerso = '".$id."'"."ORDER BY dateActe";

  $result = $dbh->query($sql);

    while ($row = $result->fetch_assoc())
    {
      $sql ="";
      echo "<tr>";
      echo "<th scope='row'>".row['dateActe']."</th>";
      echo "<td>".row['nomActe']."</td>";
      echo "<td>".row['type']."</td>";
      echo "<td><a href = '#'><i class='fas f-file-download'></i></a></td>";
      echo "</tr>";

    }
}




 ?>
