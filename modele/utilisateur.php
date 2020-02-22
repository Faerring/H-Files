<?php
class Utilisateur
{
  private $IDPerso = "";
  private $IDNoeud = "";
  private $IDWeb = "";
  private $lastname = "";
  private $firstname = "";
  private $profession = "";
  private $mail = "";
  private $tel = "";
  private $img = "";
  private $pwd = "";


  public function initializeUser($id,$dbh)
  {
    $this->IDWeb = $id;
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sql = "SELECT * FROM personnel WHERE IDWeb = '".$id."'";
	
    $result = $dbh->query($sql);
	
      while ($row = $result->fetch()) {
          $this->IDPerso = $row[0];
          $this->IDNoeud = $row[8];
          $this->lastname = $row[4];
          $this->firstname = $row[5];
          $this->profession = $row[1];
          $this->mail = $row[6];
          $this->tel = $row[7];
          $this->pwd = $row[3];
          $this->img = $row[9];
      }


  ///////////////////////////////////////////////////////////////////////////////////////////////////////////
  }

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// GETTERS
///////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function getID(){
    return $this->IDPerso;
  }
  public function getProfession(){
    return $this->profession;
  }
  public function getIDWeb(){
    return $this->IDWeb;
  }
  public function getMdp(){
    return $this->pwd;
  }
  public function getNom(){
    return $this->lastname;
  }
  public function getPrenom(){
    return $this->firstname;
  }
  public function getTel(){
    return $this->tel;
  }
  public function getMail(){
    return $this->mail;
  }
  public function getIDNoeud(){
    return $this->IDNoeud;
  }
  public function getImage(){
    return $this->img;
  }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
  public function setIDWeb($newID){
    $this->IDWeb = $newID;
  }

  public function setMail($newMail)
  {
    require('connexion.php');
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sql = "UPDATE 'personnel' SET 'mail' = ".$newMail."WHERE 'IDPerso' =".$id;

    $dbh->exec($sql);
    $this->mail = $newMail;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

  }



  public function setMobilePhone($newTel)
  {
    require('connexion.php');
    if (strlen($newTel) != 10)
    {
      return "Le numéro de téléphone doit contenir 10 caractères";
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sql = "UPDATE 'personnel' SET 'tel' = ".$newTel."WHERE 'IDPerso' =".$id;

    $dbh->exec($sql);
    $this->tel = $newTel;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

  }
}
 ?>
