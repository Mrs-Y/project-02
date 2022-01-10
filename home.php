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
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
        <?php include_once("nav.php"); ?>
    </header>

    <div id="home">
        <div class="bgstyle">
            <h1 style="margin-top: -195px;">Welcome to Sunrise Aparments!</h1>
            <p class="style-p">Beautiful unique, spacious apartments near city centre, but surrounded by nature and greenery.</p>
        </div>
        <br>
        <div>
            <ul>
                <li class="btn-xy"><a href="./location.php" target="_self" class="btn-xy">Discover</a></li>
                <li class="btn-xy"><a href="./galery.php" target="_self" class="btn-xy">Galery</a></li>
            </ul>
        </div>
        <h3>Congratulations! You have found the best Apartments on the best location in Kragujevac!</h3>
    </div>

    <div id="booknow">
        <div>
            <p style="font-size: 2em; color: #ffcbae;"><i>The best price is on our site!</i></p>
            <span style="font-size: 1.3em;">$135/night</span>
        </div>
        <?php
        if (isset($totalprice)) {
            if ($cknout > $cknin) {
                echo "<h3>Total price is $totalprice euros.</h3> Enjoy and relax in our apartment!";
            } else {
                echo "Check-Out date must be higher than Check-In date. Please enter valid data.";
            }
        } ?>
        <div>
            <form action="./home.php" method="get">
                <input type="date" name="ckn-in" id="ckn-in" />
                <input type="date" name="ckn-out" id="ckn-out" />
                <select name="guests" id="guests">
                    <option value="Guests" selected hidden invisible>Guests</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select><br>
                <input type="checkbox" name="checkbox-food" id="checkbox-food" />
                <label for="checkbox-food" class="ckbx-left">$30/day <span class="food">food included</span></label><br>
                <input type="submit" value="Calculate price" id="btn-calculate" />
            </form>
        </div>
        <?php include_once("book.php"); ?>
    </div>

    <h4>
        <a href=" https://booking.com/" target="_blank">BOOKING.COM </a> <b>|</b> TRAVELLER REVIEW AWARDS 2021 -
        Sunrise Apartments <span>9.8<b> out of 10</b> </span>
    </h4>
    <?php include_once("location.php"); ?>
    <div id="about">
        <?php include_once("about.php"); ?>
    </div>

    <div id="contact">
        <?php include_once("contact.php"); ?>
    </div>

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