<?php
include_once('../initdb.php');
session_start();

//ako korisnik vec postoji u sesiji
if (isset($_SESSION['user'])) {
    header('Location: ../indexlogged.php');
}

//ako korisnik vec postoji u cookies
if (isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
    header('Location: ../indexlogged.php');
}

//ako se korisnik upravo ulogovao
if (isset($_POST['user']) && isset($_POST['pass'])) {
    if ($connection->proveriKorisnika($_POST['user'], $_POST['pass'])) {
        //ako je checkiran keep me logged in
        if (isset($_POST['keep'])) {
            setcookie("user", $_POST['user'], time() + 60 * 60 * 24);
        }
        $_SESSION['user'] = $_POST['user'];
        header('Location: ../indexlogged.php');
    }
    $greska = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="../style/style.css">
    <style>
        @font-face {
            font-family: JennaSue;
            src: url(../font/JennaSue.ttf);
        }
    </style>
</head>

<body>
    <header>
        <nav id="navigation">
            <ul>
                <li class="left"><a href="../index.php" target="_self">Home</a></li>
                <li class="left"><a href="../index.php#about" target="_self">About</a></li>
                <li class="left"><a href="../index.php#contact" target="_self">Contact Us</a></li>
                <li class="rightbook"><a href="./book.php" target="_self" id="booknow">Book Now</a></li>
            </ul>
            <img src="../images/cover2.jpg" alt="cover.jpg" id="img-home" />
        </nav>
    </header>
    <h3>Please, login to continue...</h3>
    <form method="POST" action="../indexlogged.php">
        <label for="user">Username: </label>
        <input type="email" id="user" name="user" />
        <br>
        <label for="pass">Password: </label>
        <input type="password" id="pass" name="pass" />
        <br>
        <label for="keep">Keep me logged in: </label>
        <input type="checkbox" name="keep" id="keep" />
        <br>
        <input type="submit" value="Login" class="btn-send" />
    </form>
    <?php if (isset($greska) && $greska) : ?>
        <div id='greska'>Invalid input. Please, check username and password.</div>
    <?php endif; ?>
</body>

</html>