<?php

class execRequest {


	/*---------------------------------------------------------------------------------------------------*/
	public static function checkNode($childNode) {
		return $dbh->query("SELECT IDNoeud FROM Noeud WHERE IDNoeud=".$childNode);
	}
	public static function addEmployee($ID, $profession, $login, $mdp, $nom, $prenom, $mail, $node) {
		$q = $dbh->prepare("INSERT INTO Personnel VALUES(:ID, :profession, :login, :mdp, :nom, :prenom, :mail, :node)");
		$q->execute(array("ID"=>$ID, "profession"=>$profession, "login"=>$login	, "mdp"=>$mdp, "nom"=>$nom, "prenom"=>$prenom, "mail"=>$mail, "node"=>$node));
	}
	public static function setNewPasswd($nmdp) {
		$q = $dbh->prepare("UPDATE Personnel SET motDePasse=SHA1(:motDePasse");
		$q->execute(array("motDePasse"=>$nmdp));
	}
	public static function addDocument($id, $target_file, $idActe) {
		$q = $dbh->prepare("INSERT INTO document (IDDocu, NomDocu, IDActe) VALUES (:IDDocu, :NomDocu, :IDActe)");
		$q->execute(array("IDDocu"=>$id, "NomDocu"=>$target_file, "IDActe"=>$idActe));
	}
	public static function addStructDoc($id, $fileType) {
		$q = $dbh->prepare("INSERT INTO structure (IDDocu, type) VALUES (:IDDocu, :type)");
		$q->execute(array("IDDocu"=>$id, "type"=>$fileType));
	}
	public static function addRawDoc($id, $type_img) {
		$q = $dbh->prepare("INSERT INTO brut (IDDocu, type) VALUES (:IDDocu, :type)");
		$q->execute(array("IDDocu"=>$id, "type"=>$type_img));
	}
	public static function getLastID() {
		return $dbh->query("SELECT MAX(IDDocu) FROM document");
	}
	/*---------------------------------------------------------------------------------------------------*/
	/*---------------------------------------------------------------------------------------------------*/
    //Consultation patient
    public static function viewPData($patientID,$dbh){
		$y = "SELECT * FROM dmp_patient WHERE UUID LIKE '".$patientID."'";
		$donneesP = $dbh->query($y);
		return $donneesP;
    }
    public static function getHospitalisation($patientID,$dbh) {
		$y = "SELECT IDHosp, DateHostpitalisation FROM hospitalisation WHERE UUID LIKE '".$patientID."'";
		$hospitalisations = $dbh->query($y);
		return $hospitalisations;
	}
    public static function getActes($patientID, $hosp, $dbh) {
		$y = "SELECT IDActe FROM acte NATURAL JOIN affectation NATURAL JOIN hospitalisation WHERE UUID LIKE '".$patientID."' AND IDHosp = ".$hosp;
		$actes = $dbh->query($y);
		return $actes;
	}
    public static function getAllergies($patientID,$dbh){
        $y = "SELECT antecedent.nom FROM `antecedent` JOIN dmp_patient ON antecedent.UUID = dmp_patient.UUID WHERE type = 'Allergies' AND dmp_patient.UUID LIKE '".$patientID."'";
        $allergies = $dbh->query($y);
        return $allergies;
    }
    public static function getAntecedentMedicaux($patientID,$dbh){
      $y = "SELECT antecedent.nom FROM `antecedent` JOIN dmp_patient ON antecedent.UUID = dmp_patient.UUID WHERE type = 'Antecedents medicaux' AND dmp_patient.UUID LIKE  '".$patientID."'";
      $a_medicaux= $dbh->query($y);
      return $a_medicaux;
    }
    public static function getAntecedentChirurgicaux($patientID,$dbh){
      $y = "SELECT antecedent.nom FROM `antecedent` JOIN dmp_patient ON antecedent.UUID = dmp_patient.UUID WHERE type = 'Antecedents chirurgicaux' AND dmp_patient.UUID LIKE  '".$patientID."'";
      $a_chirurgicaux= $dbh->query($y);
      return $a_chirurgicaux;
    }
    public static function getDepartement($patientID,$dbh){
      $y = "SELECT noeud.nom FROM noeud JOIN dmp_patient ON noeud.IDNoeud = dmp_patient.IDNoeud WHERE dmp_patient.UUID LIKE '".$patientID."'";
      $depHopital = $dbh->query($y);
      return $depHopital;
	}
	public static function getMedecinTraitant($patientID,$dbh){
		$y = "SELECT medecintraitant.nom FROM medecintraitant JOIN dmp_patient ON medecintraitant.IDMedTraitant = dmp_patient.IDMedTraitant WHERE dmp_patient.UUID LIKE '".$patientID."'";
		$MedecinTraitant = $dbh->query($y);
		return $MedecinTraitant;
	  }
	public static function getConst($patientID,$dbh) {
		$y = "SELECT Heure, FC, Saturation, TA, Temp, Observation FROM constantes WHERE UUID LIKE '".$patientID."' ORDER BY IDC DESC LIMIT 1";
		$const = $dbh->query($y);
		return $const;
	}
	public static function getUUID($numSecu,$dbh) {
		$y = "SELECT UUID FROM dmp_patient WHERE numSecu = '".$numSecu."'";
		$const = $dbh->query($y);
		return $const;
	}
	public static function updatePersonalInfo($UUID, $field_value, $field, $dbh) {
		$y = "UPDATE dmp_patient SET ".$field."='".$field_value."' WHERE UUID='".$UUID."'";
		$res = $dbh->query($y);
		return $res;
	}
	public static function updateConst($UUID, $field_value, $field, $dbh) {
		$y = "UPDATE constantes SET ".$field."='".$field_value."' WHERE UUID='".$UUID."'";
		$res = $dbh->query($y);
		return $res;
	}
	/*---------------------------------------------------------------------------------------------------*/
	/*---------------------------------------------------------------------------------------------------*/
	//Page de connexion
	public static function getLogin($dbh) {
		if($dbh!=false) {
			$q = "SELECT IDWeb, mdp FROM personnel";
			return $dbh->query($q);
		}
	}
	/*---------------------------------------------------------------------------------------------------*/
	/*---------------------------------------------------------------------------------------------------*/
	//Page entrées/sorties
	public static function getEntrees($dbh,$noeud,$nomPers) {
		$x = 'SELECT dmp_patient.nom, dmp_patient.prenom, DateAffec, medecintraitant.nom FROM personnel, medecintraitant, dmp_patient NATURAL JOIN hospitalisation NATURAL JOIN affectation
	WHERE (dmp_patient.IDNoeud = '.$noeud.') AND (personnel.nom = "'.$nomPers.'") AND (affectation.DateAffec IN (SELECT DateAffec FROM affectation WHERE DateAffec >= (SELECT DATE_SUB(NOW(), INTERVAL 7 DAY))))
	AND (medecintraitant.IDMedTraitant = dmp_patient.IDMedTraitant)';
		$result = $dbh->query($x);
		return $result;
	}
	public static function getSorties($dbh,$noeud,$nomPers) {
		$x = 'SELECT dmp_patient.nom, dmp_patient.prenom, DateFinAffec, medecintraitant.nom FROM personnel, medecintraitant, dmp_patient NATURAL JOIN hospitalisation NATURAL JOIN affectation
	WHERE (dmp_patient.IDNoeud = '.$noeud.') AND (personnel.nom = "'.$nomPers.'") AND (affectation.DateFinAffec IN (SELECT DateFinAffec FROM affectation WHERE DateFinAffec >= (SELECT DATE_SUB(NOW(), INTERVAL 7 DAY))))
	AND (medecintraitant.IDMedTraitant = dmp_patient.IDMedTraitant)';
		$result = $dbh->query($x);
		return $result;
	}
	public static function requestAdd($nom,$prenom,$date,$time,$dbh,$nomPers,$noeud) {
		$x = 'INSERT INTO affectation VALUES("",NULL,"'.$date.' '.$time.':00",(SELECT IDNoeud FROM personnel WHERE nom = "'.$nomPers.'"),(SELECT IDHosp FROM hospitalisation NATURAL JOIN dmp_patient WHERE nom LIKE "'.$nom.'" AND prenom LIKE "'.$prenom.'"))';
		$result = $dbh->query($x);
		$y = 'UPDATE dmp_patient SET IDNoeud = "'.$noeud.'" WHERE nom LIKE "'.$nom.'" AND prenom LIKE "'.$prenom.'"';
		$result2 = $dbh->query($y);
		return $result;
	}
	public static function requestUpdate($nom,$prenom,$date,$time,$dbh){
		$result = execRequest::findUnfinishedAffectation($nom,$prenom,$dbh);
		if ($result != false) {
			$y = 'UPDATE affectation SET DateFinAffec = "'.$date.' '.$time.':00" WHERE IDAffec = '.$result[0];
			$result2 = $dbh->query($y);
			return $result2;
		}
	}
	public static function findUnfinishedAffectation($nom,$prenom,$dbh) {
		$x = 'SELECT IDAffec FROM affectation NATURAL JOIN hospitalisation NATURAL JOIN dmp_patient WHERE UUID = (SELECT UUID from dmp_patient WHERE nom LIKE "'.$nom.'" AND prenom LIKE "'.$prenom.'") AND DateFinAffec IS NULL';
		$result = $dbh->query($x)->fetch();
		return $result;
	}
		
	public static function findPatient($nom,$prenom,$dbh) {
		$x = 'SELECT * FROM dmp_patient WHERE nom LIKE "'.$nom.'" AND prenom LIKE "'.$prenom.'"';
		$result = $dbh->query($x)->fetch();
		return $result;
	}
	/*---------------------------------------------------------------------------------------------------*/

	/*---------------------------------------------------------------------------------------------------*/
    //enregistrement patiens
    public static function folderInfoFromNSS($NSS, $dbh)
    {
        $x = 'SELECT `nom`,`prenom`,`UUID` FROM `dmp_patient` WHERE `numSecu` = "' . $NSS . '";';
        return $dbh->query($x);
    }

    public static function UUIDFromNss($NSS, $dbh)
    {
        $x = 'SELECT `UUID` FROM `dmp_patient` WHERE `numSecu` = "' . $NSS . '";';
        return $dbh->query($x);
    }

    public static function NssFromUUID($UUID, $dbh)
    {
        $x = 'SELECT `numSecu` FROM `dmp_patient` WHERE `UUID` = "' . $UUID . '";';
        return $dbh->query($x);
    }

    public static function addHospitalisation($IDhospital, $enterDate, $outDate, $UUID, $dbh)
    {
        $x = $outDate != "" or $outDate != NULL ? 'INSERT INTO `hospitalisation` (`IDHosp`, `DateHostpitalisation`, `DateFin`, `UUID`) VALUES (`'.$IDhospital.'`,`'.$enterDate.'`,`'.$outDate.'`,`'.$UUID.'`);' : 'INSERT INTO `hospitalisation` (`IDHosp`, `DateHostpitalisation`, `DateFin`, `UUID`) VALUES (`'.$IDhospital.'`,`'.$enterDate.'`,NULL,`'.$UUID.'`);';
        return $dbh->query($x);
    }

	public static function addPatient($UUID, $numSecu, $numSecuRepLegal, $numVitale, $nom, $prenom, $sexe, $dateNaissance, $adresse, $lieuNaissance, $telephone, $IDNoeud, $IDMedTraitant, $dbh)
	{
		$x = 'INSERT INTO `dmp_patient` (`UUID`, `numSecu`, `numSecuRepLegal`, `numVitale`, `nom`, `prenom`, `sexe`, `dateNaissance`, `adresse`, `lieuNaissance`, `telephone`, `IDNoeud`, `IDMedTraitant`) VALUES (`'.$UUID.'`,`'. $numSecu.'`,`'. $numSecuRepLegal.'`,`'. $numVitale.'`,`'. $nom.'`,`'. $prenom.'`,`'. $sexe.'`,`'. $dateNaissance.'`,`'. $adresse.'`,`'.$lieuNaissance.'`,`'.$telephone.'`,`'.$IDNoeud.'`,`'.$IDMedTraitant.')';
		return $dbh->query($x);
	}

    /*---------------------------------------------------------------------------------------------------*/
	public static function getNodesID($dbh)
	{
		$x = 'SELECT `IDNoeud` FROM `noeud`';
		return $dbh->query($x);
	}

    /*---------------------------------------------------------------------------------------------------*/
    public static function getMedTraitant(PDO $dbh)
    {
		$x = 'SELECT `IDMedTraitant`,`nom` FROM `medecintraitant` ';
		return $dbh->query($x);
    }
}

?>
