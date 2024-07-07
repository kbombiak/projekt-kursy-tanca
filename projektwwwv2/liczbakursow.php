<?php
require("menu.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Kursy i liczba uczestników</h2>
    <?php
    $sql = "SELECT k.id, k.nazwa, k.obrazek, COUNT(u.idUzytkownika) AS liczba_osob
    FROM kursy k
    LEFT JOIN ulubione u ON k.id = u.idKursu
    GROUP BY k.id, k.nazwa, k.obrazek";
    $result = $conn->query($sql);

    echo "<div class='course-container'>";
    if ($result->num_rows > 0) {
        echo "<table>";
        while ($row = $result->fetch_object()) {
            
            echo "<tr>";
            echo "<td><img src='obrazki/{$row->obrazek}' alt='{$row->nazwa}' width='100'></td>";
            echo "<td><a href='kursanci.php?id={$row->id}'>{$row->nazwa}</a></td>";
            echo "<td>Zapisani {$row->liczba_osob}</td>";
            echo "</tr>";
            
        }
        echo "</table>";
    } else {
        echo "Brak wyników";
    }
    echo "</div>";
    $conn->close();
    ?>
</div>
</body>
</html>