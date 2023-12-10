<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="/css/styles.css"/>

    <!-- adding library for icons for top right -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product->name ?></title>
</head>


<body>

<?php
$imgPath = '/images/products/' . $product->mainImage;
?>

<nav>
    <div id="nav-placeholder">

    </div>

    <script>
        $(document).ready(function () {
            $('#nav-placeholder').load('/navbar');
        });
    </script>
</nav>

<h1> <?php echo $product->name ?> </h1>

<div id="product-view-container">
    <div id="product-view-container-image">
        <img src="<?php echo $imgPath ?>" alt="Image of the Product" width="400px" id="product-view-image">
    </div>
    <div id="product-view-container-info">
        <h2><?php echo $product->name ?></h2>
        <h3>£<?php echo $product->price ?></h3>
        <p><?php echo $product->description ?></p>

        <p id="add-to-basket-button">Add to Basket</p>

    </div>

</div>

</body>

</html>
