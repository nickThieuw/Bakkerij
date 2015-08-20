<?php
session_start();
require_once 'business/bestellingSERVICE.php';
require_once 'entities/bestelling.php';
require_once 'datum.php';

if(!isset($_GET["wat"])){
    unset($_SESSION["message"]);
}


    //datepicker instellen

    //is het een update?
    if (isset($_SESSION["id_bestelling"])){
        
        $beschik = new Datum();
        $beschik->beschikUpdateBestel($_SESSION["id_bestelling"], $_SESSION["id"]);
        $result = $beschik->getResult();
        $lengte = $beschik->getLength();
  
        
    //anders is het een insert?
    }else{
        $beschik = new Datum();
        $beschik->beschikNieuwBestel($_SESSION["id"]);
        $result = $beschik->getResult();
        $lengte = $beschik->getLength();

    
    }
    
    //prijzen in een variabele gestopt voor latere updates van de applicatie en aanpasbaarheid

    $_SESSION["volkorenPRIJS"]=2.10;
    $_SESSION["witbroodPRIJS"]=2.10;
    $_SESSION["croissantPRIJS"]=0.85;
    $_SESSION["boterkoekPRIJS"]=0.80;
    $_SESSION["frangiPRIJS"]=0.95;
    $_SESSION["eclairPRIJS"]=0.99;

if (isset($_GET["af"])&&$_GET["af"]="afreken"){
                
                
                if (isset($_POST["volkoren"])){
                $_SESSION["volkoren"]=$_POST["volkoren"];
                }
                if (isset($_POST["witbrood"])){
                $_SESSION["witbrood"]=$_POST["witbrood"];
                }
                if (isset($_POST["croissant"])){
                  $_SESSION["croissant"]=$_POST["croissant"];
                }
                if (isset($_POST["boterkoek"])){
                $_SESSION["boterkoek"]=$_POST["boterkoek"];
                }
                if (isset($_POST["frangipane"])){
                $_SESSION["frangi"]=$_POST["frangipane"];
                }
                if (isset($_POST["eclair"])){
                $_SESSION["eclair"]=$_POST["eclair"];        
                }
                
                if(isset($_SESSION["id_bestelling"])){
                
                    $bestellingSERV=new BestellingService();
                    $bestelling=$bestellingSERV->getBestelling($_SESSION["id_bestelling"]);
                     
                if(($_POST["volkoren"]!= $bestelling->getVolkoren()) ||
                        ($_POST["witbrood"]!= $bestelling->getWitbrood()) ||
                        ($_POST["croissant"]!= $bestelling->getCroissant()) ||
                         ($_POST["boterkoek"]!= $bestelling->getBoterkoek()) ||
                        ($_POST["frangipane"]!= $bestelling->getFrangipane()) ||
                        ($_POST["eclair"]!= $bestelling->getEclair())) {
                            //totaal
                            $totaal= $_SESSION["volkoren"]*$_SESSION["volkorenPRIJS"]+
                                    $_SESSION["witbrood"]* $_SESSION["witbroodPRIJS"]+
                                    $_SESSION["croissant"]* $_SESSION["croissantPRIJS"]+
                                    $_SESSION["boterkoek"]* $_SESSION["boterkoekPRIJS"]+
                                    $_SESSION["frangi"]* $_SESSION["frangiPRIJS"]+
                                    $_SESSION["eclair"]*$_SESSION["eclairPRIJS"];

                            $_SESSION["totaal"]=$totaal;
                            $_SESSION["navigatie"]=true;
                            include 'presentation/afrekenen.php';

                    }else{
                        $_SESSION["message"]="U heeft niks gewijzigd";    
                        header('location: bestel.php?wat=melding');
                        exit(0);
                    }
                }
                elseif(!empty($_POST["volkoren"])||!empty($_POST["witbrood"])||
                !empty($_POST["croissant"])|| !empty($_POST["boterkoek"])||
                !empty($_POST["frangipane"])||!empty($_POST["eclair"])){  
                 
   
                //totaal
                $totaal= $_SESSION["volkoren"]*$_SESSION["volkorenPRIJS"]+
                        $_SESSION["witbrood"]* $_SESSION["witbroodPRIJS"]+
                        $_SESSION["croissant"]* $_SESSION["croissantPRIJS"]+
                        $_SESSION["boterkoek"]* $_SESSION["boterkoekPRIJS"]+
                        $_SESSION["frangi"]* $_SESSION["frangiPRIJS"]+
                        $_SESSION["eclair"]*$_SESSION["eclairPRIJS"];
                
                $_SESSION["totaal"]=$totaal;
                $_SESSION["navigatie"]=true;
                include 'presentation/afrekenen.php';              
                }else{
                $_SESSION["message"]="U heeft nog niks gekozen";    
                header('location: bestel.php?wat=melding');
                exit(0);
                }
}else {
    include 'presentation/afrekenen.php';
}