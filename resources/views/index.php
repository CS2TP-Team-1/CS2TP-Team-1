<!DOCTYPE html>
<html>
<?php
use App\Models\Product
?>
<head>
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link rel = "stylesheet" type="text/css" href="<?php echo asset('css/styles.css')?>" />  

    <!-- adding library for icons for top right -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <nav>
        <div id="nav-placeholder">

        </div>

        <script>
            $(document).ready(function () {
                $('#nav-placeholder').load('/navbar');
            });  
        </script>
    </nav>
<<<<<<< Updated upstream:resources/views/index.php

    <h1>Welcome to The Jewellery Store</h1>

=======
    
    <h1 class="intro">Welcome to The Jewellery Store</h1>
>>>>>>> Stashed changes:resources/views/home.PHP
    <p>
        Here you can search by categories and view bestselling items.
    </p>

    <h2>Categories</h2>
    <a href="ring_search"> <img src="<?php echo asset('images/homepage/ring.jpg')?>" alt="Ring" class="productImg"><a>
    <a href="bracelet_search"><img src="<?php echo asset('images/homepage/bracelet.png')?>" alt="Bracelet" class="productImg"><a>
    <a href="earring_search"><img src="<?php echo asset('images/homepage/earring.jpg')?>" alt="Earring" class="productImg"><a>
    <a href="watch_search"><img src="<?php echo asset('images/homepage/watch.jpg')?>" alt="Watch" class="productImg"><a>
    <a href="necklace_search"><img src="<?php echo asset('images/homepage/necklace.jpg')?>" alt="Watch" class="productImg"><a>
    <h2>Best-selling items</h2>

    <?php
    $bestsellingProducts = Product::where('promotion','=', 1)->get();

    foreach ($bestsellingProducts as $product) {
        echo $product->name .' | Price £'. $product->price .'<br>';
    }
    ?>

</body>

</html>