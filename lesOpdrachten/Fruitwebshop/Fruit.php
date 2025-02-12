<?php
// functie definitie class Fruit
// auteur Caylen Ramazan

class Fruit{

    // properties
    public $Name;
    private $Price;

    // functions
    function setPrice($prijs){
        $this->Price = $prijs;
    }


    function getPrice(){
       return $this->Price;
    }

}

?>