<?php
if (isset($_GET["ckn-in"]) && isset($_GET["ckn-out"]) && isset($_GET["guests"])) {
    $cknin = $_GET["ckn-in"];
    $in = strtotime($cknin);
    $cknout = $_GET["ckn-out"];
    $out = strtotime($cknout);
    $guests = $_GET["guests"];
    $price = (int)(135);
    $nights = (($out - $in) / 60 / 60 / 24);
    $result = ($nights * $price);
    $book = $result * $guests;
    $totalprice = $book;

    if (isset($_GET["ckn-in"]) && isset($_GET["ckn-out"]) && isset($_GET["guests"]) && isset($_GET["checkbox-food"])) {
        $ckbfood = ($_GET["checkbox-food"]);
        $ckbfood = 30;
        $foodinc = $nights * $ckbfood;
        $totalfood = $foodinc * $guests;
        $totalprice = ($totalfood + $book);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunrise Apartments</title>
    <link rel="stylesheet" href="./style/style.css">
    <style>
        @font-face {
            font-family: JennaSue;
            src: url(./font/JennaSue.ttf);
        }
    </style>
</head>

<body>
    <header>
        <?php include_once("./pages/nav.php"); ?>
    </header>

    <div id="home">
        <div class="bgstyle">
            <!-- dodati username -->
            <h1>Welcome!</h1>
            <p class="style-p">Beautiful unique, spacious apartments near city centre, but surrounded by nature and greenery.</p>
        </div>
        <br>
        <h3>Congratulations! You successfully logged in!</h3>
    </div>

    <h4>
        <a href=" https://booking.com/" target="_blank">BOOKING.COM </a> <b>|</b> TRAVELLER REVIEW AWARDS 2021 -
        Sunrise Apartments <span>9.8<b> out of 10</b> </span>
    </h4>
    <form action="./pages/logout.php" method="post">
        <input type="submit" value="Logout" id="btn-logout" class="btn-send" />
    </form>

    <footer>
        <div class="inlinefooter">
            <ul>
                <li><a href="#home" target="_self">Home</a></li>
                <li><a href="#about" target="_self">About</a></li>
                <li><a href="#contact" target="_self">Contact Us</a></li>
                <li><a href="#booknow" target="_self">Book Now</a></li>
            </ul>
        </div>
        <div class="inlinefooter">
            <p>Copyright by <b>IT Bootcamp</b> <span>&#169;</span> students</p>
        </div>
    </footer>
</body>

</html>