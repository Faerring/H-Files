<?php


function createDMP($UUID, $numSecu, $numSecuRepLegal, $nom, $prenom, $sexe, $dateNaissance, $adresse, $lieuNaissance, $telephone, $IDNoeud, $IDMedTraitant, $dbh)
{
    if (!folderExist($nom, $prenom, $UUID, $dbh)) {
        $dirname = $nom . ' ' . $prenom . ' (' . $UUID . ')';
        execRequest::addPatient($UUID, $numSecu, $numSecuRepLegal, $nom, $prenom, $sexe, $dateNaissance, $adresse, $lieuNaissance, $telephone, $IDNoeud, $IDMedTraitant, $dbh);
//        mkdir('../patients/'.$dirname);
    }
}


function dirNameFromUUID($UUID, $dbh)
{

    $info = execRequest::folderInfoFromNSS(execRequest::NssFromUUID($UUID, $dbh), $dbh);
    return ($info['nom'] . ' ' . $info['prenom'] . ' (' . $UUID . ')');

}

function AddHospitalisation($UUID, $datein, $dateout, $service, $dbh)
{
//    $name = "";
//    $firstname = "";
//    try {
//        $info=execRequest::folderInfoFromNSS(execRequest::NssFromUUID($UUID,$dbh),$dbh);
//        $name = $info['nom'];
//        $firstname = $info['prenom'];;
//    }catch (PDOException $e){
//        echo '<h1> no folder found in database for '.$UUID.'</h1>';
//    }
//    if(folderExist($name, $firstname, $UUID,$dbh)){
    if (true) {
//        mkdir('../patients/'.dirNameFromUUID($UUID).'/Hospitalisation du '.$datein.' service - '.$service);
        execRequest::addHospitalisation($datein, $dateout, $UUID, $service, $dbh);
    }
}

function folderExist($nom, $prenom, $NSS, $dbh)
{
    $UUID = execRequest::UUIDFromNss($NSS, $dbh)->fetch();
    $dirname = $nom . ' ' . $prenom . ' (' . $UUID . ')';
    $filename = "../patiens/" . $dirname . "/";
    return file_exists($filename);
}

?>