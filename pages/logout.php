<?php
session_start();

unset($_COOKIE['user']);
setcookie('user', '', time() - 3600);

session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
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
    <div>
        <h3>You successfully logout from Sunrise Apartments. Click <a href='./login.php'>here</a> to login.</h3>
    </div>
</body>

</html>