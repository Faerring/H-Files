<?php


function createFolder($nom, $prenom, $UUID)
{
    if (!folderExist($nom, $prenom, $UUID)) {
        $dirname = $nom . ' ' . $prenom . ' (' . $UUID . ')';
    }
}


function dirNameFromUUID($UUID)
{
    require('encapsulation.php');
    $info = execRequest::folderInfoFromUUID();
    return($info['nom'] . ' ' . $info['prenom'] . ' (' . $UUID . ')');

}

function AddHospitalisation($UUID,$date,$service)
{
    if(folderExist()){
        mkdir('../patients/'.dirNameFromUUID($UUID).'/Hospitalisation du '.$date.' service - '.$service);
    }
}

function folderExist($nom, $prenom, $UUID)
{
    $dirname = $nom . ' ' . $prenom . ' (' . $UUID . ')';
    $filename = "../patiens/" . $dirname . "/";
    return file_exists($filename);
}

?>