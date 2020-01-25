<?php
class Utilisateur
{
  private $IDPerso;
  private $IDNoeud;
  private $IDWeb;
  private $lastname;
  private $firstname;
  private $profession;
  private $mail;
  private $tel;
  private $img;
  private $pwd;


  private function initializeUser()
  {
    if ($IDWeb == null ){
      return "IDWeb n'a pas été initialisé";
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sql = "SELECT * FROM 'personnel' WHERE 'IDWeb' =$IDWeb ";

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
  private function getID(){
    return $this->IDPerso;
  }
  private function getProfession(){
    return $this->profession;
  }
  private function getIDWeb(){
    return $this->IDWeb;
  }
  private function getMdp(){
    return $this->pwd;
  }
  private function getNom(){
    return $this->lastname;
  }
  private function getPrenom(){
    return $this->firstname;
  }
  private function getTel(){
    return $this->tel;
  }
  private function getMail(){
    return $this->mail;
  }
  private function getIDNoeud(){
    return $this->IDNoeud;
  }
  private function getImage(){
    return $this->img;
  }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
  private function setIDWeb($newID){
    $this->IDWeb = $newID;
  }

  private function setMail($newMail)
  {
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sql = "UPDATE 'personnel' SET 'mail' = $newMail WHERE 'IDPerso' =$id ";

    $connexion->exec($sql);
    $this->mail = $newMail;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

  }



  private function setMobilePhone($newTel)
  {
    if (strlen($newTel) != 10)
    {
      return "Le numéro de téléphone doit contenir 10 caractères";
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sql = "UPDATE 'personnel' SET 'tel' = $newTel WHERE 'IDPerso' =$id ";

    $connexion->exec($sql);
    $this->tel = $newTel;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

  }
}
 ?>
