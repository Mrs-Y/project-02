<?php
if (isset($_POST["ckn-in"]) && isset($_POST["ckn-out"]) && isset($_POST["guests"])) {
    $cknin = $_POST["ckn-in"];
    $start_date = strtotime($cknin);
    $cknout = $_POST["ckn-out"];
    $end_date = strtotime($cknout);
    $guests = $_POST["guests"];
    $price = (int)(135);
    $nights = (($end_date - $start_date) / 60 / 60 / 24);
    $result = ($nights * $price);
    $book = $result * $guests;
    $totalprice = $book;

    if (isset($_POST["ckn-in"]) && isset($_POST["ckn-out"]) && isset($_POST["guests"]) && isset($_POST["checkbox-food"])) {
        $ckbfood = ($_POST["checkbox-food"]);
        $ckbfood = 30;
        $foodinc = $nights * $ckbfood;
        $totalfood = $foodinc * $guests;
        $totalprice = ($totalfood + $book);
    }
}
?>

<?php
class Apartment
{
    const BR = "<br />";
    public $image;
    public $name;
    public $description;
    public $price;
    private $dir = "./images/";


    function __construct(string $name, string $image, string $description, int $person, int $bath, int $bed, int $area)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->person = $person;
        $this->bath = $bath;
        $this->bed = $bed;
        $this->area = $area;
    }

    function get_print_apartment()
    {
        $this->name;
        $this->image;
        $this->description;
        $this->person;
        $this->bath;
        $this->bed;
        $this->area;
    }

    function set_print_apartment($name, $image, $description, $person, $bath, $bed, $area)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->person = $person;
        $this->bath = $bath;
        $this->bed = $bed;
        $this->area = $area;
    }

    public function print_apartment()
    {
        echo "<div class='inline-blocks'style='margin-right: 10px'>";
        echo "<div class=\"single\">";
        echo "<a href=\"./galery.php\" target=\"\"><img src=\"../{$this->dir}{$this->image}\" alt=\"$this->name\" style=\"width: 15em; height: auto;\"></a>";
        echo "</div>";
        echo "<div class=\"single\">";
        echo "<h3><font size='15px'>$this->name</font></h3>" . self::BR;
        echo "<textarea class=\"scroller\" rows=\"7\" cols=\"30\" style=\"resize: none\" disabled>$this->description</textarea>";
        echo "<ul>";
        echo "<li class=\"amenities\"><img src=\"../images/person-icon.png\" alt=\" width=\"15px\" height=\"15px\" /> $this->person </li>";
        echo "<li class=\"amenities\"><img src=\"../images/bath-icon.png\" alt=\" width=\"20px\" height=\"20px\" /> $this->bath </li>";
        echo "<li class=\"amenities\"><img src=\"../images/bed-icon.png\" alt=\" width=\"20px\" height=\"20px\" /> $this->bed </li>";
        echo "<li class=\"amenities\"><img src=\"../images/area-icon.png\" alt=\" width=\"15px\" height=\"15px\" /> Size: $this->area m<sup>2</sup></li>";
        echo "</ul>";
        echo "</div>";

        echo "<form action=\"./book.php\" method=\"post\">
                <input type=\"date\" name=\"ckn-in\" id=\"ckn-in\" required />
                <input type=\"date\" name=\"ckn-out\" id=\"ckn-out\" required />
                <select name=\"guests\" id=\"guests\" required>
                    <option value=\"Guests\" selected hidden invisible>Guests</option>
                    <option value=\"1\">1</option>
                    <option value=\"2\">2</option>
                    <option value=\"3\">3</option>
                </select><br>
                <input type=\"checkbox\" name=\"checkbox-food\" id=\"checkbox-food\" />
                <label for=\"checkbox-food\" class=\"ckbx-left\">$30/day <span class=\"food\">food included</span></label><br>
                <input type=\"submit\" value=\"Book Now\" id=\"btn-book\" name=\"submit\" />
            </form>";

        echo "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="../style/style.css">
    <style>
        @font-face {
            font-family: Gayathri;
            src: url(../font/Gayathri-Regular.ttf);
        }

        @font-face {
            font-family: JennaSue;
            src: url(../font/JennaSue.ttf);
        }
    </style>
</head>

<body>
    <div>
        <ul>
            <li class='backbutton'><a href=" javascript:history.back(1)" class="backbutton">Go Back</a></li>
            <li class='backbutton'><a href="../index.php" class="backbutton">Home</a></li>
        </ul>
    </div>
    <div>
        <h1>Apartments</h1>
        <h3>A selection of our Luxury Properties</h3>
    </div>

    <?php

    $apartment = new Apartment("Apartment One", "one-1.jpg", "Large beautiful one-bedroom apartment and one bathrooms in the heart of Kragujevac with private big Jacuzzi accommodates up to 2 people. In apartment TV and a fully equipped kitchen that provides guests with a dishwasher, a microwave, a washing machine, a fridge, an oven and new furniture. With a huge terrace and magnificent city view. Pet-friendly.", 2, 1, 1, 36);
    $apartment->print_apartment();

    /* Attempt MySQL server connection.*/
    $link = mysqli_connect("localhost", "root", "", "reservations");
    // Check connection
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    // Escape user inputs for security
    if (isset($_POST["ckn-in"]) && isset($_POST["ckn-out"])) {
        $start_date = mysqli_real_escape_string($link, $_REQUEST["ckn-in"]);
        $end_date = mysqli_real_escape_string($link, $_REQUEST["ckn-out"]);
        // Attempt insert query execution
        $sql = "INSERT INTO `bookings` (`start_date`, `end_date`) VALUES ('$start_date', '$end_date')";
        if (mysqli_query($link, $sql)) {
            echo "<h3>Thank You! Your booking is confirmed at Sunrise Apartments.</h3>";
        } else {
            echo "We're sorry! A Apartment is sold out $sql. " . mysqli_error($link);
        }
    }
    // Close connection
    mysqli_close($link);
    ?>
    <?php
    $apartment->set_print_apartment("Apartment Five", "five-1.jpg", "Luxury two-bedroom apartment with city view and privet jacuzzi, accommodates up to 2 people. In apartment TV and a fully equipped kitchen that provides guests with a dishwasher, a microwave, a washing machine, a fridge, an oven and new furniture. With a big veranda and BBQ. Pet-friendly.", 2, 1, 1, 64);
    $apartment->print_apartment();
    ?>
    <?php
    $apartment->set_print_apartment("Apartment Nine", "nine-1.jpg", "Cozy two-bedroom apartment with sea view, accommodates up to 3 people. In apartment TV and a fully equipped kitchen that provides guests with a dishwasher, a microwave, a washing machine, a fridge, an oven and new furniture. Perfect choice for holydays. Pet-friendly.", 3, 2, 2, 78);
    $apartment->print_apartment();
    ?>
</body>

</html>