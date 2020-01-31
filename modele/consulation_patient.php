<?php
    public function viewFile($patientID, $yourNode){
        require('connexionBDD.php');
        
    }

    public function viewPData($patientID){
        require('connexionBDD.php');
        if (isset($_POST['IDHosp']) && ($_POST['IDHosp'] == $patientID) && ($_POST['IDHosp'] != '')){
            $y = "SELECT * FROM dmp_patient WHERE UUID LIKE ".$patientID;
            $donneesP = $dbh->query($y);
        }
    }
?>