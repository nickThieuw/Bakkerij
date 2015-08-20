<?php
//waarom steek een delete van een profiel erin
//dat is voor al die keren dat ik nieuwsbrieven krijg van websites waar ik
//toch geen profiel meer van heb, ze zouden me ook moeten verwijderen uit hun
//database, keiambetant is dat
session_start();
include_once 'business/gebruikerSERVICE.php';
unset($_SESSION["message"]);

if(isset($_GET["wijzig"])&&$_GET["wijzig"]=="delete"){
    //als je een andere pagina pakt en duwt back, zit je anders met een foutmelding
    if (isset($_SESSION["id"])){
                               
    
    $gebruikerS=new GebruikerService();
    $gebruikerS->deleteGebruiker($_SESSION["id"]);
    setcookie("user","",time()-3600,"/");
    header('location: index.php?delete=delete&&action=signOut');
    }
}
else {
   header('location: index.php');
   exit(0);
}