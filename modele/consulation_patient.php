<?php
	require('connexionBDD.php');
    public function viewFile($patientID, $yourNode){
        
        
    }

    public function viewPData($patientID){
            $y = "SELECT * FROM dmp_patient WHERE UUID LIKE ".$patientID;
            $donneesP = $dbh->query($y);
            return $donneesP;
    }

    function getAllergies($patientID){
        $y = "SELECT * FROM dmp_patient WHERE UUID LIKE ".$patientID;
        $donneesP = $dbh->query($y);
        return $donneesP;
    }
    
    function getHospitalisation($patientID) {
		$y = "SELECT UUID FROM Hospitalisation WHERE UUID LIKE ".$patientID;
		$hospitalisations = $dbh->query($y);
		return $hospitalisations;
	}
?>
