<?php
session_start();

require_once 'business/gebruikerSERVICE.php';
require_once 'entities/gebruiker.php';

unset($_SESSION["message"]);
if(isset($_SESSION["id"])){
$gebruikerS = new GebruikerService();
$gebruiker=$gebruikerS->getGebruiker($_SESSION["id"]);

if (isset($_GET["action"]) && $_GET["action"] == "wijzig" && $_GET["wat"]=="gegevens") {
                                        
                            $vnaam=$_POST["voornaam"];
                            $fnaam= $_POST["familienaam"];
                            $adres=$_POST["adres"];
                            $postcode=$_POST["postcode"];
                            $gemeente=$_POST["gemeente"];
                           
                            
                            if (!empty($vnaam)&&!empty($fnaam)&&!empty($adres)&&!empty($postcode)&&
                                    !empty($gemeente)){
                                
                                if($vnaam != $gebruiker->getVoornaam()||
                                            $fnaam != $gebruiker->getFamilienaam()||
                                            $adres != $gebruiker->getAdres()||
                                            $postcode != $gebruiker->getPostcode()||
                                            $gemeente != $gebruiker->getGemeente()){
                                     if($gebruikerS->checkPostcodeGemeente($postcode, $gemeente)){       
                                            //wijzig entitie
                                          
                                            $gebruiker->setVoornaam($vnaam);
                                            $gebruiker->setFamilienaam($fnaam);
                                            $gebruiker->setAdres($adres);
                                            $gebruiker->setPostcode($postcode);
                                            $gebruiker->setGemeente($gemeente);
                                            
                                            //wijzig SESSION
                                            $_SESSION["vnaam"]=$vnaam;
                                            $_SESSION["fnaam"]=$fnaam;

                                            //wijzig database
                                            $gebruikerS->updateGebruiker($gebruiker);
                                
                                            //melding
                                            $messageUwGegevens="Uw gegevens zijn gewijzigd";
                                            include 'presentation/updateForm.php';
                                     }else{
                                        $messageUwGegevens="Postcode en gemeente kennen geen match";
                                        include 'presentation/updateForm.php';
                                     }
                                    }else{
                                        $messageUwGegevens="U heeft niks gewijzigd aan de gegevens";
                                        include 'presentation/updateForm.php';
                                    }
                                
                            }else{
                                $messageUwGegevens="Alle gegevens zijn verplicht";
                                include 'presentation/updateForm.php';
                            }
                            
} elseif (isset($_GET["action"]) && $_GET["action"] == "wijzig" && $_GET["wat"]=="email") {
                            if(empty($_POST["email"]) || empty($_POST["email2"])){
                                $messageEmail="Niks ingevuld?";
                            }
                            elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && !filter_var($_POST["email2"], FILTER_VALIDATE_EMAIL)){
                                $messageEmail="De opgegeven emailadressen zijn niet geldig";
                            }
                            elseif ($_POST["email"] === $_POST["email2"]) {
                                
                                if($gebruikerS->checkGebruikerE($_POST["email"], $_SESSION["id"])){
                                    $messageEmail="Dit emailadres komt al voor";
                                }elseif($_POST["email"] === $gebruikerS->getEmailGebruiker($_SESSION["id"])){
                                    $messageEmail="Te wijzigen email is hetzelfde als bestaand email";
                                }else{
                                    $email=$_POST["email"];
                                    setcookie("user", $_POST["email"],time() + (86400 * 30),"/");
                                    $gebruikerS->updateGebruikerEmail($gebruiker, $email);
                                    $messageEmail="Uw email is gewijzigd";
                                }
                            }
                            elseif ($_POST["email"] != $_POST["email2"]){
                                
                                $messageEmail="Uw emailadressen komen niet overeen";
                            }
                            include 'presentation/updateForm.php';
                                    
}
elseif (isset($_GET["action"]) && $_GET["action"] == "wijzig" && $_GET["wat"]=="paswoord") {
                            if(empty($_POST["paswoord"]) || empty($_POST["paswoord2"])){
                                $messagePaswoord="Niks ingevuld?";
                            }else{
                                try {
                                    $gebruikerS->updateGebruikerPaswoord($gebruiker, $_POST["paswoord"],$_POST["paswoord2"]);
                                    $messagePaswoord="Uw paswoord is gewijzigd";
                                } catch (Exception $ex) {
                                     $messagePaswoord=$ex->getMessage();
                                }
                            }
                            
                            include 'presentation/updateForm.php';
               
} else {
    include 'presentation/updateForm.php';
}

}
