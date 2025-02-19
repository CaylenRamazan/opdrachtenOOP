<?php
//Maken en laten zien van huizen
//Gemaakt door Cayle Ramazan

include_once "huis.php";

// Huis aanmaken en kamers toevoegen
$house = new House();
$house->addRoom(new Room(5, 4, 3));
$house->addRoom(new Room(6, 5, 3));
$house->addRoom(new Room(4, 3, 2.5));

// Details weergeven
$house->showDetails();