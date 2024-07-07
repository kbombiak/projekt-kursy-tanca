<?php
require("session.php");
require("db.php");
?>
<nav>
    <p>
        <log>Witaj <?= $_SESSION["login"] ?>!</log>
        <a href="index.php">Strona główna</a>
        <a href="favourites.php">Moje kursy</a>
        <a href="myReviews.php">Recenzje</a>
        <a href="info.php">Instruktorzy</a>
        <a href="logout.php">Wyloguj</a>
        <a href="liczbakursow.php">Uczestnicy</a>
    </p>
</nav>
