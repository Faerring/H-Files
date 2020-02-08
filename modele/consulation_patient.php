<?php
	require('connexionBDD.php');
    public function viewFile($patientID, $yourNode){
        
        
    }

    public function viewPData($patientID){
        if (isset($_POST['IDHosp']) && ($_POST['IDHosp'] == $patientID) && ($_POST['IDHosp'] != '')){
            $y = "SELECT * FROM dmp_patient WHERE UUID LIKE ".$patientID;
            $donneesP = $dbh->query($y);
            return $donneesP;
        }
    }

    function getAllergies($patientID){
        if (isset($_POST['IDHosp']) && ($_POST['IDHosp'] == $patientID) && ($_POST['IDHosp'] != '')){
            $y = "SELECT * FROM antecedent WHERE UUID LIKE ".$patientID;
            $antecedent = $dbh->query($y);
            return $antecedent;
        }
    }
    
    function getHospitalisation($patientID) {
		$y = "SELECT UUID FROM Hospitalisation WHERE UUID LIKE ".$patientID;
		$hospitalisations = $dbh->query($y);
		return $hospitalisations;
	}
?>
