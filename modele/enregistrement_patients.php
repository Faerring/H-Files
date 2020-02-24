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

    $name = "";
    $firstname = "";
    try {
        $info=execRequest::folderInfoFromNSS(execRequest::NssFromUUID($UUID));
        $name = $info['nom'];
        $firstname = $info['prenom'];;
    }catch (PDOException $e){
        echo '<h1> no folder found in database for '.$UUID.'</h1>';
    }
    if(folderExist($name,$firstname,$UUID)){
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