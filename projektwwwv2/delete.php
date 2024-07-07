<?php
require("session.php");
require("db.php");

if ($_SESSION['rola'] != 'admin') {
    die("Brak dostępu. Ta strona jest dostępna tylko dla administratorów.");
}

$id = $_POST['id'];


$sql = "DELETE FROM kursy WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
}
$conn->close();
?>

