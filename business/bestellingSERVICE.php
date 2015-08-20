<?php

require_once 'data/bestellingDAO.php';

class BestellingService {
    
    public function insertBestelling($volkoren, $witbrood, $croissant, $boterkoek, $frangipane, $eclair, $totaal, $datum, $id) {
        $bestellingDAO = new BestellingDAO();
        return $bestellingDAO->insert($volkoren, $witbrood, $croissant, $boterkoek, $frangipane, $eclair, $totaal, $datum, $id);
    }
    public function getMijnBestellingen($id) {
        $bestellingDAO = new BestellingDAO();
        return $bestellingDAO->getMijnBestellingen($id);
    }
    
    public function updateBestelling($volkoren, $witbrood, $croissant, $boterkoek, $frangipane, $eclair, $totaal, $datum, $id_bestelling){
        $bestellingDAO= new BestellingDAO();
        $SQL=$bestellingDAO->updateBestelling($volkoren, $witbrood, $croissant, $boterkoek, $frangipane, $eclair, $totaal, $datum, $id_bestelling);
        return $SQL;
        
    }
    public function getBestelling($id_bestelling){
        $bestellingDAO= new BestellingDAO();
        return $bestellingDAO->createEntitie($id_bestelling);
    }
    public function deleteBestelling($id_bestelling) {
        $bestellingDAO= new BestellingDAO();
        $bestellingDAO->delete($id_bestelling);
    }
    public function beschikbaarheidDatumUpdate($id_bestelling, $id){
             $bestellingDAO= new BestellingDAO();
            return $bestellingDAO->beschikbaar($id_bestelling, $id);
    }
    public function beschikbaarheidDatum($id){
        $bestellingDAO= new BestellingDAO();
        return $bestellingDAO->beschikbaarheid($id);
    }
    public function isBestelMax($id){
        $bestellingDAO = new BestellingDAO();
        return $bestellingDAO->telMijnBestellingen($id);
    }
}