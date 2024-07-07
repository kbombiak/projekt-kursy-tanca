<?php
require("session.php");
require("db.php");

if ($_SESSION['rola'] != 'admin') {
    die("Brak dostępu. Ta strona jest dostępna tylko dla administratorów.");
}

$id = $_POST['id'];
$nazwa = $_POST['nazwa'];
$opis = $_POST['opis'];
$godziny = $_POST['godziny'];
$obrazek = $_FILES['obrazek']['name'];

if ($obrazek) {
    
    move_uploaded_file($_FILES['obrazek']['tmp_name'], "obrazki/$obrazek");
    $sql = "UPDATE kursy SET nazwa='$nazwa', opis='$opis', godziny='$godziny', obrazek='$obrazek' WHERE id=$id";
} else {
    $sql = "UPDATE kursy SET nazwa='$nazwa', opis='$opis', godziny='$godziny' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    
    header("Location: details.php?id=$id");
} else {
    echo "Błąd: " . $conn->error;
}

$conn->close();
?>