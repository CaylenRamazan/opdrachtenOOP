<?php
require_once "Figures.php";

$colors = ["red", "blue", "green", "orange"];

$figures = [];
foreach ($colors as $color) {
    $figures[] = new Triangle($color, 100, 100);
    $figures[] = new Circle($color, 50);
    $figures[] = new Square($color, 80);
    $figures[] = new Rectangle($color, 120, 80);
}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SVG Figuren</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }
        td {
            padding: 20px;
        }
    </style>
</head>
<body>
    <h1>SVG Figuren</h1>
    <table>
        <?php
        $counter = 0;
        echo "<tr>";
        foreach ($figures as $figure) {
            echo "<td><svg width='120' height='120'>" . $figure->draw() . "</svg></td>";
            $counter++;

            if ($counter % 4 == 0) {
                echo "</tr><tr>";
            }
        }
        echo "</tr>";
        ?>
    </table>
</body>
</html>
