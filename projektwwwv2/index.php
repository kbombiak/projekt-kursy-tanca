<?php
require("menu.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    
    <h1>Kategorie</h1>
    <?php
    $conn = new mysqli("localhost", "root", "", "projektwwwv2");
    $sql = "SELECT id, nazwa FROM kategorie";
    $result = $conn->query($sql);

    echo "<button class='category-button' onclick='window.location.href=\"index.php\"'>Wszystkie</button>";
    while ($row = $result->fetch_object()) {
        echo "<button class='category-button' onclick=\"window.location.href='index.php?idKategorii={$row->id}'\">{$row->nazwa}</button>";
    }

    $conn->close();
    ?>

    <h2>Wyszukiwanie Kursów</h2>
    <form>
        <p>
            <input type="text" name="fraza">
            <input type="submit" value="Wyszukaj">
        </p>
    </form>
    
    <?php if ($_SESSION['rola'] == 'admin'): ?>
        <form action="insertForm.php" method="post">
            
            <input type="submit" value="Dodaj nowy kurs">
        </form>
    <?php endif; ?>

    <h2>Lista Kursów</h2>
    
    <?php
    $conn = new mysqli("localhost", "root", "", "projektwwwv2");
    

    $sql = "SELECT id, nazwa, obrazek FROM kursy";
    if (isset($_GET["idKategorii"])) {
        $idKategorii = $_GET["idKategorii"];
        $sql .= " WHERE idKategorii = $idKategorii";
    } elseif (isset($_GET["fraza"])) {
        $fraza = $_GET["fraza"];
        $sql .= " WHERE nazwa LIKE '%$fraza%'";
    }

    $result = $conn->query($sql);

    echo "<div class='course-container'>";
    if ($result->num_rows > 0) {
        echo "<table>";
        while ($row = $result->fetch_object()) {
            
            echo "<tr>";
            echo "<td><img src='obrazki/{$row->obrazek}' alt='{$row->nazwa}' width='100'></td>";
            echo "<td><a href='details.php?id={$row->id}'>{$row->nazwa}</a></td>";
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
