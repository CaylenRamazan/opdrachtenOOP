<?php

include "product.php";

$productList = new ProductList();

$music1 = new Music("Henk tanked", 5, 21, 2, "een album over henk die tankt", "Henk");
$music1->addNumber("henk tank");
$music1->addNumber("ending scene");
$productList->addProduct($music1);

$music2 = new Music("emir is baas", 10, 21, 3, "None", "Emir");
$music2->addNumber("baas");
$music2->addNumber("best in the game");
$music2->addNumber("mijn tribute naar john pork");
$music2->addNumber("free george");
$productList->addProduct($music2);

$music3 = new Music("Caylen op de beat", 10, 21, 3, "None", "Caylen");
$music3->addNumber("Rust");
$music3->addNumber("Pingel");
$music3->addNumber("Hattrick");
$music3->addNumber("222 seconde");
$music3->addNumber("als ik een vogel was");
$productList->addProduct($music3);

$movie1 = new Movie("End Game", 12, 21, 3, "", "DVD");
$productList->addProduct($movie1);

$movie2 = new Movie("Starwars ", 18, 21, 4, "Description", "Blueray");
$productList->addProduct($movie2);

$game1 = new Game("Call of Duty warzone", 5, 21, 2, "Description", "FPS");
$game1->addRequirement("4gb geheugen");
$game1->addRequirement("970 GTX");
$productList->addProduct($game1);

$game2 = new Game("Forza horizon", 10, 21, 3, "Description", "Racing");
$game2->addRequirement("8gb geheugen");
$game2->addRequirement("2070 RTX");
$productList->addProduct($game2);

$products = $productList->getProducts();

echo "<table border='1'>";
echo "<tr><th>Category</th><th>Naam product</th><th>Verkoopprijs</th><th>Info</th></tr>";

foreach ($products as $product) {
    echo "<tr>";
    echo "<td>{$product['Category']}</td>";
    echo "<td>{$product['Name']}</td>";
    echo "<td>{$product['Sale Price']}</td>";
    echo "<td>";
    if (is_array($product['Info'])) {
        echo "<ul>";
        foreach ($product['Info'] as $key => $value) {
            echo "<li>$key";
            if (is_array($value)) {
                echo "<ul>";
                foreach ($value as $subvalue) {
                    echo "<li>$subvalue</li>";
                }
                echo "</ul>";
            } else {
                echo ": $value";
            }
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo $product['Info'];
    }
    echo "</td>";
    echo "</tr>";
}

echo "</table>";
?>