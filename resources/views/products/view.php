<!DOCTYPE html>
<html>
<head>
    <!-- 
    <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"/>
    -->
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link rel = "stylesheet" type="text/css" href="<?php echo asset('css/styles.css')?>" />  

    <!-- adding library for icons for top right -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>

    <div class="logoimg">
        <img src='{{asset("/logo.img.jpg)}}' alt = ""  height="50" width="50">
    </div>

    <!--icons-->
    <div class="icons">
        <ul>
            <li>
                <a href="#"><i class="fa fa-search"></i></a>
            </li>
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
            $(document).ready(function(){
                $('#nav-placeholder').load('/navbar');
            });  
        </script>
    </nav>

    
</body>

</html>