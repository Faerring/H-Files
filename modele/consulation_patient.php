<?php
    public function viewFile($patientID, $yourNode){
        require('connexionBDD.php');
        
    }

    public function viewPData($patientID){
        require('connexionBDD.php');
        if (isset($_POST['IDHosp']) && ($_POST['IDHosp'] == $patientID) && ($_POST['IDHosp'] != '')){
            $y = "SELECT * FROM dmp_patient WHERE UUID LIKE ".$patientID;
            $donneesP = $dbh->query($y);
            return $donneesP;
        }
    }

    function getAllergies($patientID){
        require('connexionBDD.php');
        if (isset($_POST['IDHosp']) && ($_POST['IDHosp'] == $patientID) && ($_POST['IDHosp'] != '')){
            $y = "SELECT * FROM antecedent WHERE UUID LIKE ".$patientID;
            $antecedent = $dbh->query($y);
            return $antecedent;
        }
        
    }
?>