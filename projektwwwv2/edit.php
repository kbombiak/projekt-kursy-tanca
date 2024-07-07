<?php
require("session.php");
require("db.php");

if ($_SESSION['rola'] != 'admin') {
    die("Brak dostępu. Ta strona jest dostępna tylko dla administratorów.");
}

$id = $_POST['id'];

$sql = "SELECT * FROM kursy WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edytuj kurs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Edytuj kurs</h2>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <p>Nazwa:</p>
        <input type="text" name="nazwa" value="<?= $row['nazwa'] ?>" required>
        <br>
        <p>Opis:</p>
        <textarea name="opis" required><?= $row['opis'] ?></textarea>
        <br>
        <p>Pojemność:</p>
        <input type="number" name="godziny" value="<?= $row['godziny'] ?>" required>
        <br>
        <p>Obrazek:</p>
        <input type="file" name="obrazek">
        <br>
        <input type="submit" value="Zapisz zmiany">
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>