<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo asset('css/styles.css') ?>" />

        <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>

        <!-- adding library for icons for top right -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>

    <body>

        <div class="logoimg">
            <img src=" <?php echo asset('logo.img.jpg')?>" alt="Ring" class="productImg" alt = ""  height="400" width="500">
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



        <div class="contact-c" style="display: flex; justify-content: center;">
            <div class="contact" style="box-shadow: 0 0 10px; width:50%; margin: 50px auto;">
                <header>
                    <h1>Contact us</h1>
                    <p >Complete the form below and we will get back to you within 24 hours.</p>
                </header>

                <form class="contact" action="<?php echo url('contact'); ?>" method="POST" style="display: flex; flex-direction:column; align-items: left;" >
                    <?php echo csrf_field(); ?>
                    <label for="name">Tell us your name:</label> <br>
                    <input type="text" name="name"/><br>
                    <label for="email" styles>Email:</label><br>
                    <input  type="text" name="email" /> <br>
                    <label for="message">Message:</label><br>
                    <textarea name="message" rows="15" cols="40"></textarea><br>
                    <button type="submit">Submit</button><br>
                </form>
            </div>

            <div class="contact-info">
                <div class="contact-info-item">
                    <div class="contact-info-icons">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="contact-info-content">
                        <h3>Address</h3>
                        <p>The Jewellery Store, Asron st<br/>
                            Birmingham
                        </p>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-icons">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="contact-info-content">
                        <h3>Phone</h3>
                        <p>+44(0)7544-987-654</p>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-icons">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="contact-info-content">
                        <h3>Email</h3>
                        <p>jewellerystore@gmail.com</p>
                    </div>
                </div>
            </div>

        </div>












        </div>









    </body>


</html>
