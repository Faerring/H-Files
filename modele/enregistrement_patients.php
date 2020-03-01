<?php


function createFolder($UUID, $numSecu, $numSecuRepLegal, $numVitale, $nom, $prenom, $sexe, $dateNaissance, $adresse, $lieuNaissance, $telephone, $IDNoeud, $IDMedTraitant, $dbh)
{
    require('encapsulation.php');
    if (!folderExist($nom, $prenom, $UUID, $dbh)) {
        $dirname = $nom . ' ' . $prenom . ' (' . $UUID . ')';
        execRequest::addPatient($UUID, $numSecu, $numSecuRepLegal, $numVitale, $nom, $prenom, $sexe, $dateNaissance, $adresse, $lieuNaissance, $telephone, $IDNoeud, $IDMedTraitant, $dbh);
    }
}


function dirNameFromUUID($UUID)
{
    require('encapsulation.php');
    $info = execRequest::folderInfoFromUUID();
    return($info['nom'] . ' ' . $info['prenom'] . ' (' . $UUID . ')');

}

function AddHospitalisation($UUID,$date,$service,$dbh)
{
    $name = "";
    $firstname = "";
    try {
        $info=execRequest::folderInfoFromNSS(execRequest::NssFromUUID($UUID));
        $name = $info['nom'];
        $firstname = $info['prenom'];;
    }catch (PDOException $e){
        echo '<h1> no folder found in database for '.$UUID.'</h1>';
    }
    if(folderExist($name, $firstname, $UUID,$dbh)){
        mkdir('../patients/'.dirNameFromUUID($UUID).'/Hospitalisation du '.$date.' service - '.$service);
    }
}

function folderExist($nom, $prenom, $NSS, $dbh)
{
    require('encapsulation.php');
    $UUID= execRequest::UUIDFromNss($NSS,$dbh)->fetch();
    $dirname = $nom . ' ' . $prenom . ' (' . $UUID . ')';
    $filename = "../patiens/" . $dirname . "/";
    return file_exists($filename);
}
?>