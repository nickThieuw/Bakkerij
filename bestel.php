<?php
session_start();
require_once 'business/bestellingSERVICE.php';
require_once 'entities/bestelling.php';
$bestellingSERV=new BestellingService();
if(!isset($_GET["wat"])){
    unset($_SESSION["message"]);
}

if (isset($_SESSION["id"])){
    unset($_SESSION["navigatie"]);
    if(isset($_SESSION["id_bestelling"])){
        
        $bestelling=$bestellingSERV->getBestelling($_SESSION["id_bestelling"]);
        include 'presentation/bestelling.php';
    
    }elseif(isset($_GET["id_bestelling"])){
        
        $bestelling=$bestellingSERV->getBestelling($_GET["id_bestelling"]);
        $_SESSION["id_bestelling"] = $_GET["id_bestelling"];
        include 'presentation/bestelling.php';
        
    
    }elseif (!$bestellingSERV->isBestelMax($_SESSION["id"])) {
        $_SESSION["message"]="Sorry uw maximum aantal bestellingen is bereikt, probeer morgen opnieuw";
        header('location: index.php?wat=melding');    
    }else{
        include 'presentation/bestelling.php';
    } 
}
else {
    $_SESSION["message"]="Log in om een bestelling te plaatsen of maak een profiel aan";
    header('location: index.php?wat=melding');
}
   
//       