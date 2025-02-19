<?php
// Functie: Hoofdprogramma webshop fruit
// Auteur: Caylen Ramazan


// Initialisatie
include_once "Fruit.php";

// Main


// Aanmaken object op basis van de class beschrijving Fruit
$banaan = new Fruit("Banaan", 2.98);
$banaan->printFruit();
// Aanmaken object op basis van de class beschrijving Fruit
$appel = new Fruit("Appel", 3.59);
$appel->printFruit();
?>