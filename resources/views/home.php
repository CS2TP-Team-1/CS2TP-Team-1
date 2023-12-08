<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/styles.css') ?>" />

    <!-- adding library for icons for top right -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
    <li>
        <a href="#"><i class="fa fa-user"></i></a>
    </li>
    <li>
        <a href="#"><i class="fa fa-shopping-basket"></i></a>
    </li>
    </ul>
    </div>

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
    <pre>
Here you can check search by categories and view 
bestselling items.
    </pre>
    <h2>Categories</h2>
    <a href="ring_search"> <img src="resources/images/homepage/ring.png" alt="Ring"
            style="width:200px;height:200px;"><a>
            <a href="bracelet_search"><img src="resources/images/homepage/bracelet.png" alt="Bracelet"
                    style="width:200px;height:200px;"><a>
                    <a href="earring_search"><img src="resources/images/homepage/earring.jpg" alt="Earring"
                            style="width:200px;height:200px;"><a>
                            <a href="watch_search"><img src="resources/images/homepage/watch.jpg" alt="Watch"
                                    style="width:200px;height:200px;"><a>
                                    <!--<img src="img_girl.jpg" alt="Necklace" style="width:200px;height:200px;">-->
                                    <h2>Best-selling items</h2>

</body>

</html>