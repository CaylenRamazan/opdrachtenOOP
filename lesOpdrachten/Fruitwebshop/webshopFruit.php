<?php
// Functie: Hoofdprogramma webshop fruit
// Auteur: Caylen Ramazan


// Initialisatie
include_once "functions.php";
include_once "Fruit.php";

// Main


// Aanmaken object op basis van de class beschrijving Fruit
$banaan = new Fruit();
$banaan->Name = "Banaan";
$banaan->setPrice(2.78);
echo"<br>";
echo"de naam is:". $banaan->Name;
echo "<br>";
echo  "de prijs is: ".$banaan->getPrice();
// Aanmaken object op basis van de class beschrijving Fruit
$appel = new Fruit();
$appel->Name = "Appel";
$appel->setPrice(3.12);
echo "<br>";
echo "de naam is:". $appel->Name;
echo "<br>";
echo "de prijs is: ". $appel->getPrice();
?>