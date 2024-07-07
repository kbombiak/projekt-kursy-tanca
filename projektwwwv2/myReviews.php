<?php
require("menu.php");


$login = $_SESSION['login'];

$sql = "SELECT ocena, tresc, data, k.id AS idKursu, nazwa 
        FROM recenzje r
        JOIN kursy k ON k.id = r.idKursu
        WHERE nick = '$login'";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje Recenzje</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    
    <h1>Recenzje</h1>
    <?php

    if ($result->num_rows > 0) {
        echo "****************************************";
        while($row = $result->fetch_assoc()) {
            echo "<div class='review'>";
            echo "<p>Data: " . $row['data'] . "</p>";
            echo "<p>Kurs: <a href='details.php?id=" . $row['idKursu'] . "'>" . $row['nazwa'] . "</a></p>";
            echo "<p>Ocena: " . $row['ocena'] . "</p>";
            echo "<p>Treść: " . $row['tresc'] . "</p>";
            echo "</div>";
            echo "****************************************";
        }
    } else {
    
        echo "<p>Brak recenzji do wyświetlenia.</p>";
    }
    ?>
</div>
</body>
</html>
