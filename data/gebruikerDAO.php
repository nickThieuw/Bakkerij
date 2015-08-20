<?php

//paswoord zou ke kunnen hashen met php sha of zoiets ->-pasword_hash bcrypt is safer
require_once 'entities/gebruiker.php';
require_once 'data/dbconfig.php';
class GebruikerDAO {

    //in gebruik
public function checkGebruiker($email){
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "select id from gebruiker where email='".$email."'";
        $result = $db->prepare($sql);
        $result->execute();
        $check = $result->rowCount();
        $db=null;
        if($check!=0){
        return true;
        }else{
        return false;
        }
}
public function checkGebruikerE($email, $id){
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "select id from gebruiker where email='".$email."' and id !='".$id."'";
        $result = $db->prepare($sql);
        $result->execute();
        $check = $result->rowCount();
        $db=null;
        if($check!=0){
        return true;
        }else{
        return false;
        }
}
    //in gebruik
public function checkGebruikerInlog($email, $wachtwoord){

          if($this->checkGebruiker($email)){
              $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
              $sql = "select id, voornaam, familienaam, wachtwoord"
                . " from gebruiker where email='".$email."'";
              $result = $db->query($sql);
              $rij = $result->fetch();
              $db = null;
              if($rij && password_verify($wachtwoord, $rij["wachtwoord"])){
                        $gegevens = array();
                        $gegevens["id"] = $rij["id"];
                        $gegevens["vnaam"] = $rij["voornaam"];
                        $gegevens["fnaam"] = $rij["familienaam"];
                         return $gegevens;
                      
              }else{
                  return null;
              }
            }
}

public function checkPostcode($postcode){
    $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
    $sql = "select naam"
                . " from gemeente where postcode='".$postcode."'";
     $result= $db->query($sql);
     $arr=array();
     $arr= $result->fetchAll();
     $db=null;
     return $arr;
}
    //in gebruik
public function insert($vnaam, $fnaam, $adres, $postcode, $gemeente, $email, $wachtw) {

        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "insert into gebruiker (voornaam, familienaam, adres, postcode, gemeente, email, wachtwoord)"
        . "values('"
        .$vnaam."',"
        ."'".$fnaam."',"
        ."'".$adres."',"
        ."'".$postcode."',"
        ."'".$gemeente."',"
        ."'".$email."',"
        ."'".$wachtw."')";      
        $db->exec($sql);
        $lastInsertedID=$db->lastInsertId();
        $db = null;
        //lastInsertedId zullen we nodig hebben om het id op te slaan in een sessie, en om te kunnen gebruiken
        //in andere pagina's
        return $lastInsertedID;
}
     //in gebruik   
public function getById($id) {
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "select id, voornaam, familienaam, adres, postcode, gemeente from"
        . " gebruiker where id='".$id."'";
        $result = $db->query($sql);
        $rij = $result->fetch();
        $gebruiker = new Gebruiker($rij['id'], $rij['voornaam'], $rij['familienaam'], $rij['adres'],
                $rij['postcode'], $rij['gemeente']);
        $db = null;
        return $gebruiker;
        }
       //in gebruik
public function getEmailById($id) {
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "select email from"
        . " gebruiker where id='".$id."'";
        $result = $db->query($sql);
        $email = $result->fetchColumn();
        $db=null;
        return $email;
    
}
    //in gebruik
public function update($gebruiker) {
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "update gebruiker set"
        . " voornaam='".$gebruiker->getVoornaam()."'"
        . " ,familienaam='".$gebruiker->getFamilienaam()."'"   
        . " ,adres='".$gebruiker->getAdres()."'"
        . " ,postcode='".$gebruiker->getPostcode()."'"
        . " ,gemeente='".$gebruiker->getGemeente()."'"
        . " where id='".$gebruiker->getId()."'";
        $db->exec($sql);
        $db = null;
        }
    //in gebruik
public function updateEmail($gebruiker, $email){
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "update gebruiker"
        . " set email='".$email."'"
        . " where id='".$gebruiker->getId()."'";
        $db->exec($sql);
        $db = null;
        }

public function updatePaswoord($gebruiker, $wachtwoord){
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "update gebruiker"
        . " set wachtwoord='". password_hash($wachtwoord, PASSWORD_BCRYPT)."'"
        . " where id='".$gebruiker->getId()."'";
        $db->exec($sql);
        $db = null;
        }

public function delete($id) {
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "delete from gebruiker where id='".$id."'";
        $db->exec($sql);
        $db = null;
        }
}
