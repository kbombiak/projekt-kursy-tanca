<?php
require("menu.php");
$id = $_GET['id'];
$sql = "SELECT * FROM kursy WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <p>Nazwa kursu: <?= $row['nazwa'] ?></p>
    <p>Opis kursu: <?= $row['opis'] ?></p>
    <p>Ilość godzin: <?= $row['godziny'] ?> </p>

    <img src="obrazki/<?= $row['obrazek'] ?>" alt="<?= $row['nazwa'] ?>" width='250'>
    <br>

    <?php
        $idUzytkownika = $_SESSION["id"];
        $sql = "SELECT id FROM ulubione WHERE idKursu = $id AND idUzytkownika = $idUzytkownika";
        $added = $conn->query($sql)->num_rows > 0;
        $src = $added ? "rezygnuj.png" : "zapiszsie.png";
        echo "<img src='$src' class='fav' data-kurs='$id' alt='ulubiony' width='200'/>";
    ?>
    <?php if ($_SESSION['rola'] == 'admin'): ?>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Edytuj kurs">
        </form>
    <?php endif; ?>

     <?php if ($_SESSION['rola'] == 'admin'): ?>
        <form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Usuń kurs">
        </form>
    <?php endif; ?>
    
    <div class='course-container'>
    <h2>Dodaj recenzję</h2>
    <form action="insertReview.php" method="post">
        <input type="hidden" name="idKursu" value="<?= $id ?>">
        
        <p>Ocena</p>
        <input type="number" name="ocena" min="1" max="5" placeholder="1-5" required>
        <br>
        
        <p>Tresc</p>
        <textarea name="tresc" placeholder="Treść recenzji" required></textarea>
        <br>
        <input type="submit" value="Dodaj recenzję">
        <br>
    </form>
     </div>
    <h2>Recenzje</h2>
    <?php
    $sql_reviews = "SELECT * FROM recenzje WHERE idKursu = $id";
    $result_reviews = $conn->query($sql_reviews);
    echo "****************************************";
    while($review = $result_reviews->fetch_assoc()) {
        
        echo "<div class='review'>";
        echo "<p>{$review['nick']}</p>";
        echo "<p>Ocena: {$review['ocena']}</p>";
        echo "<p>{$review['tresc']}</p>";
        echo "</div>";
        echo "****************************************";
    }
    
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</div>
</body>
</html>
