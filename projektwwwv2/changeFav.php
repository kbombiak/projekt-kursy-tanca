<?php
require("session.php");
require("db.php");

$idKursu = $_REQUEST["idKursu"];
$idUzytkownika = $_SESSION["id"];

$sql = "SELECT id FROM ulubione WHERE idKursu = $idKursu AND idUzytkownika = $idUzytkownika";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $id = $result->fetch_object()->id;
    $sql = "DELETE FROM ulubione WHERE id = $id";
} else {
    $sql = "INSERT INTO ulubione (idKursu, idUzytkownika) VALUES ($idKursu, $idUzytkownika)";
}

if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    echo "sukces";
}

$conn->close();
?>
