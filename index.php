<?php
session_start();
if(!isset($_GET["wat"])){
    unset($_SESSION["message"]);
}
if(isset($_GET["delete"])&&$_GET["delete"]="delete"){
        $message="Bedankt tot ziens, tot gauw, en altijd welkom!";
}
include 'presentation/home.php';
