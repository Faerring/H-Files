<?php
require('../modele/encapsulation.php');
require('../modele/connexion.php');
require('../modele/enregistrement_patients.php');
if (isset($_POST['SocialSecurityNumber'])) {
    $NSS = $_POST['SocialSecurityNumber'];
    $info = execRequest::folderInfoFromNSS($NSS, $dbh);
    /*$name = $info['nom'];
    $firstName = $info['prenom'];
    $UUID = $info['UUID'];*/
    $name = 'TEST';
    $firstName = 'Test';
    $UUID = '132465789654';
    $idFound = json_encode(array($name, $firstName, $UUID));
    require ('../vue/enregistrement_patients.php');
}
?>
