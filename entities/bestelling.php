<?php

class Bestelling{

private $volkoren;
private $witbrood;
private $croissant;
private $boterkoek;
private $frangipane;
private $eclair;
private $datum;
private $id_bestelling;

public function __construct($volkoren, $witbrood, $croissant, $boterkoek, $frangipane, $eclair, $datum, $id_bestelling){
    $this->volkoren=$volkoren;
    $this->witbrood=$witbrood;
    $this->croissant=$croissant;
    $this->boterkoek=$boterkoek;
    $this->frangipane=$frangipane;
    $this->eclair=$eclair;
    $this->datum=$datum;
    $this->id_bestelling=$id_bestelling;
}
//getters
    public function getVolkoren() {
        return $this->volkoren;
    }
    public function getWitbrood(){
        return $this->witbrood;
    }
    public function getCroissant(){
        return $this->croissant;
    }
    public function getBoterkoek() {
        return $this->boterkoek;
    }
    public function getFrangipane(){
        return $this->frangipane;
    }
    public function getEclair() {
        return $this->eclair;
    }
    public function getDatum() {
        return $this->datum;
    }
    public function getId_bestelling() {
        return $this->id_bestelling;
    }
    //setters
    public function setVolkoren($volkoren){
        $this->volkoren=$volkoren;
    }
    public function setWitbrood($witbrood){
        $this->witbrood=$witbrood;
    }
    public function setCroissant($croissant){
        $this->croissant=$croissant;
    }
    public function setBoterkoek($boterkoek){
        $this->boterkoek=$boterkoek;
    }
    public function setFrangipane($frangipane){
        $this->frangipane=$frangipane;
    }
    public function setEclair($eclair) {
        $this->eclair=$eclair;
    }
  
    
}