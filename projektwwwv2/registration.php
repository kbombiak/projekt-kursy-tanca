<?php
require("db.php");
if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    $email = $_POST["email"];

    $sql = "INSERT INTO uzytkownicy (login, haslo, email) VALUES ('$login', '" . md5($haslo) . "', '$email')";
    $result = $conn->query($sql);
    if ($result) {
        echo "<div class='form'>
                <h3>Pomyślnie zarejestrowano</h3><br/>
                <p class='link'><a href='login.php'>Zaloguj sie</a></p>
              </div>";
    } else {
        echo "<div class='form'>
                <h3>Blad</h3><br/>
                <p class='link'>ponow probe rejestracji<a href='registration.php'>rejestracji</a>.</p>
              </div>";
    }
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rejestracja</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="reg">
    <form class="form" action="" method="post">
        <h1 class="login-title">Rejestracja</h1>
        <input type="text" class="login-input" name="login" placeholder="Login" required/>
        <input type="password" class="login-input" name="haslo" placeholder="Hasło" required/>
        <input type="text" class="login-input" name="email" placeholder="Adres email" required/>
        <input type="submit" name="submit" value="Zarejestruj się" class="login-button">
        <p class="link"><a href="login.php">Zaloguj się</a></p>
    </form>
</body>
</html>
<?php
}
?>
