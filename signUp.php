<?php
session_start();
require_once 'business/gebruikerSERVICE.php';

unset($_SESSION["message"]);



if(!isset($_SESSION["id"])){
if (isset($_GET["action"]) && $_GET["action"] == "signUp") {
        //onthoud de ingevulde gegevens
        $vnaam=$_POST["voornaam"];
        $fnaam= $_POST["familienaam"];
        $adres=$_POST["adres"];
        $postcode=$_POST["postcode"];
        $gemeente=$_POST["gemeente"];
               
        $email=$_POST["email"];
        $wachtw1=$_POST["paswoord"];
        $wachtw2=$_POST["paswoord2"];
        
        $gebruikerServ = new GebruikerService();
        
        //isset checkt of de variabele niet null is en !empty checkt of die niet leeg is
        if (isset($_POST["voornaam"], $_POST["familienaam"], $_POST["adres"],$_POST["postcode"], $_POST["gemeente"])
        &&
        !empty($_POST["voornaam"]) &&
        !empty($_POST["familienaam"])&&
        !empty($_POST["adres"]) &&
        !empty($_POST["postcode"]) &&
        !empty($_POST["gemeente"])){
            if($gebruikerServ->checkPostcodeGemeente($postcode, $gemeente)){
                

                if (isset($_POST["email"], $_POST["paswoord"], $_POST["paswoord2"])
                &&
                !empty($_POST["email"]) &&
                !empty($_POST["paswoord"]) &&
                !empty($wachtw2)){
                    
                       
                        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

                            try {
                            
                            $lastInsertedID=$gebruikerServ->insertGebruiker($vnaam, $fnaam, $adres,
                                    $postcode, $gemeente, $email, $wachtw1, $wachtw2);
                            
                                                       
                            $_SESSION["id"]=$lastInsertedID;
                            $_SESSION["vnaam"]=$vnaam;
                            $_SESSION["fnaam"]=$fnaam;
                            $_SESSION["ingelogd"]=true;
                            
                            setcookie("user", $email ,time() + (86400 * 30), "/");
                            
                            $_SESSION["message"]="Uw profiel is aangemaakt";  
                            header('location: index.php?wat=melding');                           
                            exit(0);
                            
                            } catch (Exception $ex) {
                            $messageInlog = $ex->getMessage();
                            include 'presentation/signUpForm.php';
                            }
                        }else{
                            $messageInlog = "Het opgegeven email is niet geldig";
                            include 'presentation/signUpForm.php';
                        }
                       
                    
                    }else{
                    $messageInlog = "Alle inloggegevens zijn verplicht in te vullen";
                    include 'presentation/signUpForm.php';
                    }
                }else{
                    $messageUwGegevens = "Postcode en gemeentes kennen geen match";
                    include 'presentation/signUpForm.php';
                }

                } else {
                $messageUwGegevens = "Sorry we hebben enkele gegevens tekort";
                include 'presentation/signUpForm.php';               
                }
} else {
include 'presentation/signUpForm.php';
}
}else {
    header('location: index.php');
    exit(0);
}
?>