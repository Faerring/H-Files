<?php
    public function viewFile($patientID, $yourNode){
        require('connexionBDD.php');
        
    }

    public function viewPData($patientID){
        require('connexionBDD.php');
        $y = "SELECT * FROM dmp_patient WHERE UUID LIKE ".$patientID;
        $donneesP = $dbh->query($y);
        return $donneesP;
        
    }

    function getAllergies($patientID){
        require('connexionBDD.php');
        $y = "SELECT * FROM antecedent WHERE UUID LIKE ".$patientID;
        $antecedent = $dbh->query($y);
        return $antecedent;
        
        
    }
?>