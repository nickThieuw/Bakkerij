<?php

require_once 'business/gebruikerSERVICE.php';
$page=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
                
////////////inlog
if (isset($_GET["action"]) &&$_GET["action"]=="signIn"){
       if(!isset($_POST["email"]) || !isset($_POST["paswoord"]) || empty($_POST["email"])|| empty($_POST["paswoord"])){
           $_SESSION["message"]="Niks ingevuld of iets vergeten?";
       }
        elseif(isset($_POST["email"], $_POST["paswoord"])&&
        !empty($_POST["email"]) &&
        !empty($_POST["paswoord"])){
            $gebruikerS= new GebruikerService;
            $gebruikerGegevens=array();
            $gebruikerGegevens=$gebruikerS->checkGebruikerInlog($_POST["email"], $_POST["paswoord"]);
            if(!is_null($gebruikerGegevens)){ 
               
                $_SESSION["id"]=$gebruikerGegevens["id"];
                $_SESSION["vnaam"]=$gebruikerGegevens["vnaam"];
                $_SESSION["fnaam"]=$gebruikerGegevens["fnaam"];
                $_SESSION["ingelogd"]=true;
                
                setcookie("user", $_POST["email"],time() + (86400 * 30),"/");
                
                
                if($page==="signUp.php" || $page==="wissen.php") {
                    header('location: index.php');
                    exit(0);
                }
                elseif($page==="contact.php"){
                    header('location: contact.php');
                    exit(0);
                }
                
                //log je suucesvol in, in bestel.php, verwijder dan de foutmelding:
                //"Log in om een bestelling te plaatsen of maak een profiel aan"
                elseif ($page==="bestel.php") {
                    unset($message);
                }
            } else {
                $_SESSION["message"]="Sorry, dit emailadres en paswoord kennen geen match";             
            }
        }
    }   

