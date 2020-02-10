<?php
class execRequest {
        
	public static function checkNode() {
		return $dbh->query("SELECT IDNoeud FROM Noeud WHERE IDNoeud=".$childNode);
	}
	public static function addEmployee() {
		$q = $dbh>prepare("INSERT INTO Personnel VALUES(:ID, :profession, :login, :mdp, :nom, :prenom, :mail, :node)");
		$q->execute(array("ID"=>$ID, "profession"=>$profession, "login"=>$login, "mdp"=>$mdp, "nom"=>$nom, "prenom"=>$prenom, "mail"=>$mail, "node"=>$node));
	}
	public static function addEmployee() {
		$q = $dbh>prepare("UPDATE Personnel SET motDePasse=SHA1(:motDePasse");
		$q->execute(array("motDePasse"=>$_POST["nMdp"]));
	}
	public static function addDocument() {
		$q = $dbh>prepare("INSERT INTO document (IDDocu, NomDocu, IDActe) VALUES (:IDDocu, :NomDocu, :IDActe)");
		$q->execute(array("IDDocu"=>$id, "NomDocu"=>$target_file, "IDActe"=>$idActe));
	}
	public static function addStructDoc() {
		$q = $dbh>prepare("INSERT INTO structure (IDDocu, type) VALUES (:IDDocu, :type)");
		$q->execute(array("IDDocu"=>$id, "type"=>$fileType));
	}
	public static function addRawDoc() {
		$q = $dbh>prepare("INSERT INTO brut (IDDocu, type) VALUES (:IDDocu, :type)");
		$q->execute(array("IDDocu"=>$id, "type"=>$type_img));
	}
	public static function getLastID() {
		return $dbh->query("SELECT MAX(IDDocu) FROM document");
	}
	
    public static function viewPData($patientID){
            $y = "SELECT * FROM dmp_patient WHERE UUID LIKE ".$patientID;
            $donneesP = $dbh->query($y);
            return $donneesP;
    }
    public static function getAllergies($patientID){
        $y = "SELECT * FROM dmp_patient WHERE UUID LIKE ".$patientID;
        $donneesP = $dbh->query($y);
        return $donneesP;
    }
    public static function getHospitalisation($patientID) {
		$y = "SELECT IDHosp FROM Hospitalisation WHERE UUID LIKE ".$patientID;
		$hospitalisations = $dbh->query($y);
		return $hospitalisations;
	}
    public static function getActes($patientID, $hosp) {
		$y = "SELECT IDActe FROM Acte NATURAL JOIN Affectation NATURAL JOIN Hospitalisation WHERE UUID LIKE ".$patientID." AND IDHosp LIKE ".$hosp;
		$hospitalisations = $dbh->query($y);
		return $actes;
	}
	
	public static function getLogin() {
		$q = "SELECT IDWeb, mdp FROM personnel";
		return $dbh->query($y);
	}
	public static function getPNom() {
		$q = "SELECT nom FROM personnel";
		return $dbh->query($y);
	}
	public static function getPPrenom() {
		$q = "SELECT prenom FROM personnel";
		return $dbh->query($y);
	}
}
?>
