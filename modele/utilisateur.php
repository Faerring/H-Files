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


  public function initializeUser()
  {
    if ($IDWeb == "" ){
      return "IDWeb n'a pas été initialisé";
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sql = "SELECT * FROM 'personnel' WHERE 'IDWeb' =".$IDWeb ;

    if ($result = $connexion->query($sql))
    {
      while ($row = $result->fetch_assoc()) {
          $this->IDPerso = $row["IDPerso"];
          $this->IDNoeud = $row["IDNoeud"];
          $this->lastname = $row["nom"];
          $this->firstname = $row["prenom"];
          $this->profession = $row["profession"];
          $this->mail = $row["mail"];
          $this->tel = $row["tel"];
          $this->pwd = $row["mdp"];
          $this->img = $row["image"];

      }
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
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sql = "UPDATE 'personnel' SET 'mail' = ".$newMail."WHERE 'IDPerso' =".$id;

    $connexion->exec($sql);
    $this->mail = $newMail;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

  }



  public function setMobilePhone($newTel)
  {
    if (strlen($newTel) != 10)
    {
      return "Le numéro de téléphone doit contenir 10 caractères";
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sql = "UPDATE 'personnel' SET 'tel' = ".$newTel."WHERE 'IDPerso' =".$id;

    $connexion->exec($sql);
    $this->tel = $newTel;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

  }
}
 ?>
