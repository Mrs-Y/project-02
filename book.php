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
        echo "<h3><font size='15px'>$this->name</font></h3>" . self::BR;
        echo "<a href=\"./galery.php\" target=\"\"><img src=\"{$this->dir}{$this->image}\" alt=\"$this->name\" style=\"width: 70%; height: 70%;\"></a>" . self::BR;
        echo "<textarea class=\"scroller\" rows=\"7\" cols=\"30\" style=\"resize: none\" disabled>$this->description</textarea>";
        echo "<ul>";
        echo "<li class=\"amenities\"><img src=\"./images/person-icon.png\" alt=\"\" width=\"15px\" height=\"15px\" /> $this->person </li>";
        echo "<li class=\"amenities\"><img src=\"./images/bath-icon.png\" alt=\"\" width=\"20px\" height=\"20px\" /> $this->bath </li>";
        echo "<li class=\"amenities\"><img src=\"./images/bed-icon.png\" alt=\"\" width=\"20px\" height=\"20px\" /> $this->bed </li>";
        echo "<li class=\"amenities\"><img src=\"./images/area-icon.png\" alt=\"\" width=\"15px\" height=\"15px\" /> Size: $this->area m<sup>2</sup></li>";
        echo "</ul>";
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
</head>

<body>

    <div>
        <h1>Apartments</h1>
        <h3>A selection of our Luxury Properties</h3>
    </div>

    <?php

    $apartment = new Apartment("Apartment One", "one-1.jpg", "Large beautiful one-bedroom apartment and one bathrooms in the heart of Kragujevac with private big Jacuzzi accommodates up to 2 people. In apartment TV and a fully equipped kitchen that provides guests with a dishwasher, a microwave, a washing machine, a fridge, an oven and new furniture. With a huge terrace and magnificent city view. Pet-friendly.", 2, 1, 1, 36);
    $apartment->print_apartment();

    $apartment->set_print_apartment("Apartment Five", "five-1.jpg", "Luxury two-bedroom apartment with city view and privet jacuzzi, accommodates up to 2 people. In apartment TV and a fully equipped kitchen that provides guests with a dishwasher, a microwave, a washing machine, a fridge, an oven and new furniture. With a big veranda and BBQ. Pet-friendly.", 2, 1, 1, 64);
    $apartment->print_apartment();

    $apartment->set_print_apartment("Apartment Nine", "nine-1.jpg", "Cozy two-bedroom apartment with sea view, accommodates up to 3 people. In apartment TV and a fully equipped kitchen that provides guests with a dishwasher, a microwave, a washing machine, a fridge, an oven and new furniture. Perfect choice for holydays. Pet-friendly.", 3, 2, 2, 78);
    $apartment->print_apartment();

    ?>


</body>

</html>