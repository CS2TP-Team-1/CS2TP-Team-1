<!DOCTYPE html>
<html lang="en">
<?php

use App\Models\Product;

?>
<head>
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>

    <!-- adding library for icons for top right -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Jewellery Store</title>
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

<h1>Welcome to The Jewellery Store</h1>

<h2>Product Categories</h2>
<a href="ring_search"> <img src="/images/homepage/ring.jpg" alt="Rings" class="productImg"></a>
<a href="bracelet_search"><img src="/images/homepage/bracelet.png" alt="Bracelets" class="productImg"></a>
<a href="earring_search"><img src="/images/homepage/earring.jpg" alt="Earrings" class="productImg"></a>
<a href="watch_search"><img src="/images/homepage/watch.jpg" alt="Watches" class="productImg"></a>
<a href="necklace_search"><img src="/images/homepage/necklace.jpg" alt="Necklaces" class="productImg"></a>
<h2>Best-selling Items</h2>
<p>
    <?php
    $bestsellingProducts = Product::where('promotion', '=', 1)->get();
    ?>
<div id="product_container">
    <?php
    if ($bestsellingProducts->isEmpty()) {
        echo "<h2>There are no products. </h2>";
    }

    foreach ($bestsellingProducts as $product) {
        $imgPath = "/images/products/" . $product->mainImage;
        ?>

        <div id="product-info">
            <img src="<?php echo $imgPath ?>" alt="Product Image"
                 class="product-gallery-image">
            <h3><?php echo $product->name ?></h3>
            <p>£<?php echo $product->price ?></p>
            <p><a href="<?php echo "/products/$product->id" ?>">View Product
                    Details</a></p>
        </div>
        <?php
    }
    ?>

</div>
</body>

</html>
