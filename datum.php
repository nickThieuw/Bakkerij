<?php
require_once 'business/bestellingSERVICE.php';

class Datum {
    private $result;
    private $length;
    private $range;
    
    public function __construct() {
         date_default_timezone_set('Europe/Brussels');
    
        //range maken van 3 dagen
        $d=strtotime("tomorrow");
        $b= date("Y-m-d", $d);

        $d=strtotime("+4 days");
        $e= date("Y-m-d", $d);

        $begin = new DateTime($b);
        $end = new DateTime($e);

        $interval= new DateInterval('P1D');
        $period = new DatePeriod($begin, $interval, $end);

        $this->range=array();
        foreach($period as $date){
            array_push($this->range, $date->format("Y-m-d"));
        }        
        }
    public function beschikUpdateBestel($id_bestelling, $id){
             
        $bestellingSERV=new BestellingService();
        $datumsAlBesteld=array();
        $datumsAlBesteld=$bestellingSERV->beschikbaarheidDatumUpdate($id_bestelling, $id);
            
        $bezetteDatums=array();
        foreach($datumsAlBesteld as $value){
            array_push($bezetteDatums, $value["datum"]);
        }
    
        $diff = array();
        $result = array();        

        $diff = array_diff($this->range, $bezetteDatums);  
        $this->result =  array_values($diff);
        $this->length = count($this->result);
        

    }
    public function beschikNieuwBestel($id){
               
        $bestellingSERV=new BestellingService();
        $datumsAlBesteld=array();
        $datumsAlBesteld=$bestellingSERV->beschikbaarheidDatum($id);

        $bezetteDatums=array();
        foreach($datumsAlBesteld as $value){
            array_push($bezetteDatums, $value["datum"]);
        }

        $diff = array();
        $result = array();        

        $diff = array_diff($this->range, $bezetteDatums);  
        $this->result =  array_values($diff);
        $this->length = count($this->result);
        

    }
    
    public function setResult(){
        return $this->result;
    }
    public function setLength(){
        return $this->length;
    }
    public function getResult(){
        return $this->result;
    }
    public function getLength(){
        return $this->length;
    }
    public function getRange(){
        return $this->range;
    }
}