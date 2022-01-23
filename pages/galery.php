<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
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

    <div id="home">
        <div class="bgstyle">
            <h1>Welcome to Sunrise Aparments!</h1>
            <p class="style-p">Beautiful unique, spacious apartments near city centre, but surrounded by nature and greenery.</p>
        </div>
        <br>
        <h3>Congratulations! You have found the best Apartments on the best location in Kragujevac!</h3>
    </div>
    <br>
    <?php
    class Gallery
    {
        const BR = "<br />";
        public $src;
        public $alt;
        public $name;


        function __construct(string $src, string $alt, string $name)
        {
            $this->alt = $alt;
            $this->src = $src;
            $this->name = $name;
        }

        public function print_gallery()
        {
            echo "<img src=\"{$this->src}\" alt=\"{$this->alt}\" style=\"width: 300px; height: 200px;\">";
        }
    }
    ?>
    <div class='inline-blocks'>
        <h3>
            <font size='15px'>One Apartment</font>
        </h3>
        <?php $gallery = [
            new Gallery("../images/galery/one-1-1.jpg", "one-1.jpg", "One - Living Room"),
            new Gallery("../images/galery/one-1-2.jpg", "one-2.jpg", "One - Kitchen"),
            new Gallery("../images/galery/one-1-3.jpg", "one-3.jpg", "One - Bedroom"),
            new Gallery("../images/galery/one-1-4.jpg", "one-4.jpg", "One - Bedroom"),
            new Gallery("../images/galery/one-1-5.jpg", "one-5.jpg", "One - Bathroom"),
            new Gallery("../images/galery/one-1-6.jpg", "one-6.jpg", "One - Living Room"),
            new Gallery("../images/galery/one-1-7.jpg", "one-7.jpg", "One - Living Room"),
            new Gallery("../images/galery/one-1-8.jpg", "one-8.jpg", "One - Living Room"),
        ];
        foreach ($gallery as $image) {
            $image->print_gallery();
        }
        ?>
    </div>
    <div class='inline-blocks'>
        <h3>
            <font size='15px'>Five Apartment</font>
        </h3>
        <?php $gallery1 = [
            new Gallery("../images/galery/five-1-1.jpg", "five-1.jpg", "Five - Living Room"),
            new Gallery("../images/galery/five-1-2.jpg", "five-2.jpg", "Five - Kitchen"),
            new Gallery("../images/galery/five-1-3.jpg", "five-3.jpg", "Five - Bedroom"),
            new Gallery("../images/galery/five-1-4.jpg", "five-4.jpg", "Five - Bedroom"),
            new Gallery("../images/galery/five-1-5.jpg", "five-5.jpg", "Five - Bathroom"),
            new Gallery("../images/galery/five-1-6.jpg", "five-6.jpg", "Five - Living Room"),
            new Gallery("../images/galery/five-1-7.jpg", "five-7.jpg", "Five - Living Room"),
            new Gallery("../images/galery/five-1-8.jpg", "five-8.jpg", "Five - Living Room"),
        ];
        foreach ($gallery1 as $image) {
            $image->print_gallery();
        }
        ?>
    </div>
    <div class='inline-blocks'>
        <h3>
            <font size='15px'>Nine Apartment</font>
        </h3>
        <?php $gallery2 = [
            new Gallery("../images/galery/nine-1-1.jpg", "nine-1.jpg", "Nine - Living Room"),
            new Gallery("../images/galery/nine-1-2.jpg", "nine-2.jpg", "Nine - Kitchen"),
            new Gallery("../images/galery/nine-1-3.jpg", "nine-3.jpg", "Nine - Bedroom"),
            new Gallery("../images/galery/nine-1-4.jpg", "nine-4.jpg", "Nine - Bedroom"),
            new Gallery("../images/galery/nine-1-5.jpg", "nine-5.jpg", "Nine - Bathroom"),
            new Gallery("../images/galery/nine-1-6.jpg", "nine-6.jpg", "Nine - Living Room"),
            new Gallery("../images/galery/nine-1-7.jpg", "nine-7.jpg", "Nine - Living Room"),
            new Gallery("../images/galery/nine-1-8.jpg", "nine-8.jpg", "Nine - Living Room"),
        ];
        foreach ($gallery2 as $image) {
            $image->print_gallery();
        }
        ?>
    </div>
    <div>
        <ul>
            <li class='backbutton'><a href=" javascript:history.back(1)">Go Back</a></li>
        </ul>
    </div>
</body>

</html>