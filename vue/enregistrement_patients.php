<?php
require("SqueletteDePage.php");
debSquelette();
?>
<div class="row">
    <div class="col-lg-offset-1 col-lg-10">
        <form method="post" action="../controleur/enregistrement_patient.php">
            <div class="form-group">
                <label for="SocialSecurityNumber">numéro de sécurité social</label>
                <input type="text" class="form-control" name="SocialSecurityNumber" id="SocialSecurityNumber"
                       pattern="[0-9]{13}" placeholder="0 00 00 00 000 000 00">
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>
</div>
<?php
if (isset($idFound)) {
    ?>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10">
            <?php
            var_dump($idFound);
            ?>
        </div>
    </div>
    <?php
}
?>
