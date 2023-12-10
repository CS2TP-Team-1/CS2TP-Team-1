<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="icon" href="/favicon.ico" />

    <!-- adding library for icons for top right -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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

<h1>Products</h1>

<div id="product_container">
    <?php
    if ($products->isEmpty()) {
        echo "<h2>There are no products. </h2>";
    }

    foreach ($products as $product) {
        $imgPath = "images/products/" . $product->mainImage;
        ?>

        <div id="product-info">
            <img src="<?php echo $imgPath ?>" alt="Product Image" class="product-gallery-image">
            <h3><?php echo $product->name ?></h3>
            <p>£<?php echo $product->price ?></p>
            <p><a href="<?php echo "/products/$product->id" ?>">View Product Details</a></p>
        </div>
        <?php
    }
    ?>

</div>
</body>

</html>
