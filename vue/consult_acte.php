<?php
include("SqueletteDePage.php");
include("../modele/utilisateur.php");
include("../modele/acte.php");
$user = new Utilisateur;
debSquelette();


?>
<div class="row">
  <div class="col-lg-offset-1 col-lg-10">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Acte pratiqu&eacute;</th>
          <th scope="col">Type</th>
          <th scope="col">T&eacute;l&eacute;chargement</th>
        </tr>

      </thead>
      <tbody>
        <?php
          printActe($user->getID());
        ?>

      </tbody>
    </table>



  </div>
</div>

<?php
finSquelette();
 ?>
