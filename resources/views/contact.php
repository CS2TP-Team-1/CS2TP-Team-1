<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/styles.css') ?>" />

    <!--<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
    /> -->
    
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>

    <!-- adding library for icons for top right -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
    <!--icons-->
   <!-- <div class="icons">
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
    </div>-->

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
    <br>

    

<div class="contact" style="box-shadow: 0 0 10px; width:50%; margin: 50px auto;">
    <header>
        <h1><u>contact</u></h1>
        <p >Complete the form below and we will get back to you within 24 hours.</p>
    </header>
   
    <form class="contact" action="<?php echo url('contact'); ?>" method="POST" style="display: flex; flex-direction:column; align-items: left; " >
        <?php echo csrf_field(); ?>
       <!--<p><u>tell us your name</u></p>-->
        <label for="name">Tell us your name:</label> <br>
        <input type="text" name="name"/><br>    
                  
        <!--<p><u>Email Address?</u></p>-->
        <label for="email" styles>Email:</label><br>
        <input  type="text" name="email" /> <br>    
        
        <!--<input  type="text" name="Number"   />   
        <p> product </p>
        <input type="product" name="product" placeholder="title"/>  
        <p> Comment:</p>-->
        <!--<p><u>Message</u></p>-->
        <label for="message">Message:</label><br>
        <textarea name="message" rows="15" cols="40"></textarea><br>
        <button type="submit">Submit</button><br>
    </form>
 </div>
    











</div>

    
    
    
    
    
    


</body>


</html>