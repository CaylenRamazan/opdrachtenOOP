<?php
// functie definitie class Fruit
// auteur Caylen Ramazan

class Fruit{

    // properties
    public $Name;
    private $Price;

    // functions

    public function __construct($Nm, $Pr){
        $this->Name = $Nm;
        echo "<br>";
        $this->Price = $Pr;
        echo "<br>";
    }



    public function getPrice(){
       return $this->Price;
    }

    public function printFruit(){
        echo "naam is ".$this->Name;
        echo "<br>";
        echo "prijs is ".$this->Price;
        echo "<br>";
     }

}

?>