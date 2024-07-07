<?php
require("menu.php");
$idUzytkownika = $_SESSION['id'];
$sql = "SELECT k.id, k.nazwa, k.obrazek FROM kursy k, ulubione u WHERE u.idKursu = k.id AND u.idUzytkownika = $idUzytkownika";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zapisane Kursy</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Moje Kursy</h1>
    <div class='course-container'>
    <table>
        <?php
        
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
            echo "<tr><td colspan='2'>Brak kursów</td></tr>";
}

?>
</table>
</div>
</div>
</body>
</html>