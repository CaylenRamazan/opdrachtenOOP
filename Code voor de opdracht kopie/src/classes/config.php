<?php
$servername = "localhost";
$username = "root"; // Pas aan als nodig
$password = ""; // Pas aan als nodig
$dbname = "userlogin";

try {
    $PDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Databaseverbinding mislukt: " . $e->getMessage());
}
?>
