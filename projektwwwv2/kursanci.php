<?php
require("menu.php");

$idKursu = intval($_GET['id']);


$sql = "SELECT nazwa, obrazek FROM kursy WHERE id = $idKursu";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Nie znaleziono kursu.";
    exit;
}

$kurs = $result->fetch_object();


$sql = "SELECT u.login FROM uzytkownicy u
        INNER JOIN ulubione l ON u.id = l.idUzytkownika
        WHERE l.idKursu = $idKursu";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Kursanci</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Kurs: <?php echo $kurs->nazwa; ?></h2>
    <img src="obrazki/<?php echo $kurs->obrazek; ?>" alt="<?php echo $kurs->nazwa; ?>" width="200">
    <h3>Lista uczestników:</h3>
    <?php
    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_object()) {
            echo "<li>{$row->login}</li>";
        }
        echo "</ul>";
    } else {
        echo "Brak uczestników zapisanych na ten kurs.";
    }
    ?>
</div>
</body>
</html>

<?php
$conn->close();
?>
