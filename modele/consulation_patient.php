<?php
    public function viewFile($patientID, $yourNode){
        
        
    }

    public function viewPData($patientID){
            $y = "SELECT * FROM dmp_patient WHERE UUID LIKE ".$patientID;
            $donneesP = $dbh->query($y);
            return $donneesP;
    }

    function getAllergies($patientID){
        $y = "SELECT antecedent.nom FROM `antecedent` JOIN dmp_patient ON antecedent.UUID = dmp_patient.UUID WHERE type = 'Allergies' AND UUID LIKE  ".$patientID;
        $allergies = $dbh->query($y);
        return $allergies;
    }

    function getAntecedentMedicaux($patientID){
      $y = "SELECT antecedent.nom FROM `antecedent` JOIN dmp_patient ON antecedent.UUID = dmp_patient.UUID WHERE type = 'Antécédents médicaux' AND UUID LIKE  ".$patientID;
      $a_medicaux= $dbh->query($y);
      return $a_medicaux;
    }

    function getAntecedentChirurgicaux($patientID){
      $y = "SELECT antecedent.nom FROM `antecedent` JOIN dmp_patient ON antecedent.UUID = dmp_patient.UUID WHERE type = 'Antécédents chirurgicaux' AND UUID LIKE  ".$patientID;
      $a_chirurgicaux= $dbh->query($y);
      return $a_chirurgicaux;
    }

    function getDepartement($patientID){
      $y = "SELECT noeud.nom FROM noeud JOIN dmp_patient ON noeud.IDNoeud = dmp_patient.IDNoeud WHERE UUID LIKE".$patientID;
      $depHopital = $dbh->query($y);
      return $depHopital;
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
