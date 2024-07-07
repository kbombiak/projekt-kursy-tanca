<?php
$conn = new mysqli("localhost", "root", "", "projektwwwv2");


$nazwa = $_POST['nazwa'];
$opis = $_POST['opis'];
$godziny = $_POST['godziny'];

$idKategorii = $_POST['idKategorii'];
$obrazek = basename($_FILES["obrazek"]["name"]);

move_uploaded_file($_FILES["obrazek"]["tmp_name"], "obrazki/$obrazek");

$sql = "INSERT INTO kursy (nazwa, opis, godziny, obrazek, idKategorii) 
        VALUES ('$nazwa', '$opis', '$godziny', '$obrazek', '$idKategorii')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Błąd: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
