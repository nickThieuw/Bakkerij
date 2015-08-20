<?php
session_start();
require 'business/bestellingSERVICE.php';

$bestellingSERV=new BestellingService();
$bestellingSERV->deleteBestelling($_GET["id_bestelling"]);

header('location: mijnBestel.php');


