<?php

class Gebruiker {
    //email en wachtwoord sla ik niet op in een entitie omdat ik niet weet of dit safe is
    
    private $id;
    private $voornaam;
    private $familienaam;   
    private $adres;
    private $postcode;
    private $gemeente;
    
    public function __construct($id, $voornaam, $familienaam, $adres, $postcode, $gemeente){
        $this->id=$id;
        $this->voornaam=$voornaam;
        $this->familienaam=$familienaam;
        $this->adres=$adres;
        $this->postcode=$postcode;
        $this->gemeente=$gemeente;
    }
    //Getters
    public function getId(){
        return $this->id;
    }
    public function getVoornaam(){
        return $this->voornaam;
    }
    public function getFamilienaam(){
        return $this->familienaam;
    }
    public function getAdres(){
        return $this->adres;
    }
    public function getPostcode() {
        return $this->postcode;
    }
    public function getGemeente() {
        return $this->gemeente;
    }
    public function getProvincie(){
        return $this->provincie;
    }
    //Settters
    public function setId($id){
        $this->id=$id;
    }
    public function setVoornaam($voornaam){
       $this->voornaam=$voornaam;
    }
    public function setFamilienaam($familienaam){
        $this->familienaam=$familienaam;
    }
    public function setAdres($adres){
        $this->straat=$adres;
    }
    public function setPostcode($postcode) {
        $this->postcode=$postcode;
    }
    public function setGemeente($gemeente) {
        $this->gemeente=$gemeente;
    }
    
        }   
    