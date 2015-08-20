<?php

require_once 'entities/bestelling.php';
require_once 'data/dbconfig.php';
class BestellingDAO {

 
public function insert($volkoren, $witbrood, $croissant, $boterkoek, $frangipane, $eclair, $totaal,$datum, $id) {

        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "insert into bestelling (volkoren, witbrood, croissant, boterkoek, frangipane, eclair, totaal, datum, id)"
        . "values('"
        .$volkoren."',"
        ."'".$witbrood."',"
        ."'".$croissant."',"
        ."'".$boterkoek."',"
        ."'".$frangipane."',"
        ."'".$eclair."',"
        ."'".$totaal."',"
        ."'".$datum."',"
        ."'".$id."')";      
        $db->exec($sql);
        $db = null;
}

public function getMijnBestellingen($id) {
    
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "select datum, id_bestelling from  bestelling where id='".$id."'";
        $result=$db->query($sql);
        $lijst=array();
        $lijst=$result->fetchAll();
        $db=null;
        return $lijst;
}

//in gebruik
public function createEntitie($id_bestelling){
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql="select volkoren, witbrood, croissant, boterkoek, frangipane, eclair, datum from bestelling where id_bestelling='".$id_bestelling."'";
        $result=$db->query($sql);
        $rij=$result->fetch();
        $bestelling= new Bestelling($rij['volkoren'], $rij['witbrood'], $rij['croissant'], $rij['boterkoek'], $rij['frangipane'], $rij['eclair'], $rij['datum'], $id_bestelling);
        return $bestelling;       
}


public function updateBestelling($volkoren, $witbrood, $croissant, $boterkoek, $frangipane, $eclair, $totaal, $datum, $id_bestelling){
        
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "update bestelling"
        . " set volkoren=".$volkoren
        . " , witbrood=".$witbrood
        . " , croissant=".$croissant
        . " , boterkoek=".$boterkoek
        . " , frangipane=".$frangipane
        . " , eclair=".$eclair
        . " , totaal=".$totaal
        . " , datum='".$datum."'"
        . " where id_bestelling=$id_bestelling";
        $db->exec($sql);
        $db = null;
        
}
public function delete($id_bestelling){
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "delete from bestelling where id_bestelling='".$id_bestelling."'";
        $db->exec($sql);
        $db = null;
        }

public function beschikbaar($id_bestelling, $id){
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "select datum from  bestelling where id='".$id."' and id_bestelling !='".$id_bestelling."'";
        $result = $db->query($sql);
        $datums=array();
        $datums = $result->fetchAll();
        $db=null;
        return $datums;
        
}
public function beschikbaarheid($id){
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "select datum from  bestelling where id='".$id."'";    
        $result = $db->query($sql);
        $datums=array();
        $datums = $result->fetchAll();
        $db=null;
        return $datums;
        
}
public function telMijnBestellingen($id){
        $db = new PDO(DBconfig::$DB_CONNSTRING, DBconfig::$BD_USERNAME, DBconfig::$DB_PASSSWORD);
        $sql = "select datum from  bestelling where id='".$id."'";    
        $result = $db->prepare($sql);
        $result->execute();
        $check = $result->rowCount();
        $db=null;
        if($check < 3){
        return true;
        }else{
        return false;
        }
}
}

