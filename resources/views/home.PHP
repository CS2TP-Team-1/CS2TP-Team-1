<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" type="text/css" href="style.css" />
    


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">

    <!-- adding library for icons for top right -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
</head>


<body>
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
                $('#nav-placeholder').load('/navBar');
            });  
        </script>
    </nav>



    <div class="logoimg">
        <a target="#" href="logo.img.jpg">
            <img src="logo.img.jpg" alt="logo image" width="50" height="50">
            
        </a>
    </div>
    
    
    
    


</body>


</html>