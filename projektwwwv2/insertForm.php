<?php
require("session.php");

if ($_SESSION['rola'] != 'admin') {
    echo "<script>
            alert('Nie masz uprawnień do dodawania kursów, ponieważ nie jesteś administratorem.');
            window.location.href = 'index.php';
          </script>";
    //header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj Nowy Kurs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Dodaj Nowy Kurs</h1>
    
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <p>
            Nazwa: <input type="text" name="nazwa">
        </p>
        <p>
            Opis: <textarea name="opis"></textarea>
        </p>
        <p>
            Ilość godzin: <input type="text" name="godziny">
        </p>
        <p>
            Obrazek: <input type="file" name="obrazek">
        </p>
        <p>
            Kategoria: <select name="idKategorii">
                <?php
                $conn = new mysqli("localhost", "root", "", "projektwwwv2");
                
                $sql = "SELECT id, nazwa FROM kategorie ORDER BY nazwa";
                $result = $conn->query($sql);

                while ($row = $result->fetch_object()) {
                    echo "<option value='{$row->id}'>{$row->nazwa}</option>";
                }

                $conn->close();
                ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Dodaj kurs">
        </p>
    </form>
    <p><a href="index.php">Powrót do listy kursów</a></p>
</div>
</body>
</html>
