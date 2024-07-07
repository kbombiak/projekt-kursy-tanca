<?php
require('session.php');
require('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idKursu = $_POST['idKursu'];
    $ocena = $_POST['ocena'];
    $tresc = $_POST['tresc'];
    $nick = $_SESSION['login'];
    
    $sql = "INSERT INTO recenzje (idKursu, ocena, tresc, nick, data) VALUES ('$idKursu', '$ocena', '$tresc', '$nick', NOW())";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: details.php?id=$idKursu");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
