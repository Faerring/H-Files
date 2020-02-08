<?php
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
		$y = "SELECT IDHosp FROM Hospitalisation WHERE UUID LIKE ".$patientID;
		$hospitalisations = $dbh->query($y);
		return $hospitalisations;
	}
    function getActes($patientID, $hosp) {
		$y = "SELECT IDActe FROM Acte NATURAL JOIN Affectation NATURAL JOIN Hospitalisation WHERE UUID LIKE ".$patientID." AND IDHosp LIKE ".$hosp;
		$hospitalisations = $dbh->query($y);
		return $actes;
	}
?>
