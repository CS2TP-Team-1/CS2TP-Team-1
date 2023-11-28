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

    

<div class="contact">
    <header><h1><u>contact</u></h1></header>
    <p>complete the form below and we will get back to you within 24 hours</p>
    <form class="contact" action="<?php echo url('contact'); ?>" method="POST" >
        <?php echo csrf_field(); ?>
        <p><u>tell us your name</u></p>
        <input type="text" name="name"/>      
                  
        <p><u>Email Address?</u></p>
        <input  type="text" name="email"    />     
        <p><u>Message</u></p>
        <!--<input  type="text" name="Number"   />   
        <p> product </p>
        <input type="product" name="product" placeholder="title"/>  
        <p> Comment:</p>-->
        <textarea name="message" rows="15" cols="40"></textarea>
        <button type="submit">Submit</button>
    </form>
 </div>
    











</div>

    
    
    
    
    
    


</body>


</html>