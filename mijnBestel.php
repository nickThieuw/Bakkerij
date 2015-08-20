<?php
session_start();
require_once 'business/bestellingSERVICE.php';
unset($_SESSION["message"]);
$bestellingSERV=new BestellingService();
$lijst=array();

if(isset($_GET["annuleer"])&&$_GET["annuleer"]="annuleer"){
    if(isset($_GET["update"])&& $_GET["update"]="update"){
        unset($_SESSION["id_bestelling"]);
        unset($_SESSION["volkoren"]);
        unset($_SESSION["witbrood"]);
        unset($_SESSION["croissant"]);
        unset($_SESSION["boterkoek"]);
        unset($_SESSION["frangi"]);
        unset($_SESSION["eclair"]);
        unset($_SESSION["totaal"]);
        
        unset($_SESSION["volkorenPRIJS"]);
        unset($_SESSION["witbroodPRIJS"]);
        unset($_SESSION["croissantPRIJS"]);
        unset($_SESSION["boterkoekPRIJS"]);
        unset($_SESSION["frangiPRIJS"]);
        unset($_SESSION["eclairPRIJS"]);
    
        
    $_SESSION["message"]="Uw wijziging is geannuleerd";    
    
    $lijst=$bestellingSERV->getMijnBestellingen($_SESSION["id"]);
    include 'presentation/mijnbestelling.php';
    }else{
        unset($_SESSION["volkoren"]);
        unset($_SESSION["witbrood"]);
        unset($_SESSION["croissant"]);
        unset($_SESSION["boterkoek"]);
        unset($_SESSION["frangi"]);
        unset($_SESSION["eclair"]);
        unset($_SESSION["totaal"]);
        
        unset($_SESSION["volkorenPRIJS"]);
        unset($_SESSION["witbroodPRIJS"]);
        unset($_SESSION["croissantPRIJS"]);
        unset($_SESSION["boterkoekPRIJS"]);
        unset($_SESSION["frangiPRIJS"]);
        unset($_SESSION["eclairPRIJS"]);
        
        
        $_SESSION["message"]="Uw bestelling is geannuleerd";
        $lijst=$bestellingSERV->getMijnBestellingen($_SESSION["id"]);
        include 'presentation/mijnbestelling.php';
    }
    
}elseif(isset($_SESSION["id_bestelling"])){
    
    if(isset($_GET["opslaan"])&&$_GET["opslaan"]="wanneer"){
        if(isset($_POST["datum"])&& !empty($_POST["datum"])){
        
        $date = date_create_from_format('d-m-Y', $_POST["datum"]);
        //update       
        $SQL=$bestellingSERV->updateBestelling($_SESSION["volkoren"],
                $_SESSION["witbrood"], $_SESSION["croissant"],
        $_SESSION["boterkoek"],$_SESSION["frangi"], $_SESSION["eclair"],
                $_SESSION["totaal"],
        date_format($date, 'Y-m-d'), $_SESSION["id_bestelling"]);
        
        
        $_SESSION["message"]=" Uw bestelling met referentie ".$_SESSION["id_bestelling"]
                ." is gewiijzigd";
        
        unset($_SESSION["id_bestelling"]);
        unset($_SESSION["volkoren"]);
        unset($_SESSION["witbrood"]);
        unset($_SESSION["croissant"]);
        unset($_SESSION["boterkoek"]);
        unset($_SESSION["frangi"]);
        unset($_SESSION["eclair"]);
        unset($_SESSION["totaal"]);
        
        unset($_SESSION["volkorenPRIJS"]);
        unset($_SESSION["witbroodPRIJS"]);
        unset($_SESSION["croissantPRIJS"]);
        unset($_SESSION["boterkoekPRIJS"]);
        unset($_SESSION["frangiPRIJS"]);
        unset($_SESSION["eclairPRIJS"]);
        
        
        $lijst=$bestellingSERV->getMijnBestellingen($_SESSION["id"]);
        include 'presentation/mijnbestelling.php';
        }else{
            
            $_SESSION["message"]="Kies een datum om uw wijziging te vervolledigen";
            header('location: afrekening.php?wat=melding');
        }
    }elseif(isset($_SESSION["navigatie"]) && $_SESSION["navigatie"]===true){    
                unset($_SESSION["navigatie"]);
                $_SESSION["message"]="Maak eerst uw wijziging of annuleer";
                header('location: afrekening.php?wat=melding');
            }else{
                
                $_SESSION["message"]="Maak eerst uw wijziging of annuleer";
                header('location: bestel.php?wat=melding');
            }
    
}elseif(isset($_SESSION["volkoren"],
        $_SESSION["witbrood"],
        $_SESSION["croissant"],
        $_SESSION["boterkoek"],
        $_SESSION["frangi"],
        $_SESSION["eclair"],
        $_SESSION["totaal"])){
        
        if(isset($_GET["opslaan"])&&$_GET["opslaan"]="wanneer"){
   
        if(isset($_POST["datum"])&& !empty($_POST["datum"])){
        
            $date = date_create_from_format('d-m-Y', $_POST["datum"]);
         
            //insert

            $bestellingSERV->insertBestelling($_SESSION["volkoren"],
                    $_SESSION["witbrood"], $_SESSION["croissant"],
            $_SESSION["boterkoek"],$_SESSION["frangi"],
                    $_SESSION["eclair"], $_SESSION["totaal"],
            date_format($date, 'Y-m-d'), $_SESSION["id"]);
            unset($_SESSION["volkoren"]);
            unset($_SESSION["witbrood"]);
            unset($_SESSION["croissant"]);
            unset($_SESSION["boterkoek"]);
            unset($_SESSION["frangi"]);
            unset($_SESSION["eclair"]);
            unset($_SESSION["totaal"]);

            unset($_SESSION["volkorenPRIJS"]);
            unset($_SESSION["witbroodPRIJS"]);
            unset($_SESSION["croissantPRIJS"]);
            unset($_SESSION["boterkoekPRIJS"]);
            unset($_SESSION["frangiPRIJS"]);
            unset($_SESSION["eclairPRIJS"]);
            
            
            $_SESSION["message"]="Wij hebben uw bestelling voor ".$_POST["datum"]
                    ." goed ontvangen, tot gauw";
            $lijst=$bestellingSERV->getMijnBestellingen($_SESSION["id"]);
            include 'presentation/mijnbestelling.php';
            }else{
                
                $_SESSION["message"]="Gelieve een datum te kiezen";
                header('location: afrekening.php?wat=melding');
                exit(0);
            }
            
        }elseif(isset($_SESSION["navigatie"]) && $_SESSION["navigatie"]==true){
                unset($_SESSION["navigatie"]);
                $_SESSION["message"]="Maak eerst uw bestelling of annuleer";
                header('location: afrekening.php?wat=melding');
                exit(0);
        }else{
                unset($_SESSION["navigatie"]);
                $_SESSION["message"]="Maak eerst uw bestelling of annuleer";
                header('location: afrekening.php?wat=melding');
                exit(0);
        }       
}else{
    $lijst=$bestellingSERV->getMijnBestellingen($_SESSION["id"]);
    include 'presentation/mijnbestelling.php';
}

