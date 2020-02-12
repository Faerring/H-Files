<?php
require("SqueletteDePage.php");
debSquelette();
if(isset($_POST['IdFound'])){
    $patients = $_POST['IdFound'];
}
?>
<div class="row">
    <div class="col-lg-offset-1 col-lg-10">
        <form method="post" >
            <div class="form-group">
                <label for="SocialSecurityNumber">numéro de sécurité social</label>
                <input type="text" class="form-control" id="SocialSecurityNumber" pattern="[0-9]{13}" placeholder="0 00 00 00 000 000 00">
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>
</div>
