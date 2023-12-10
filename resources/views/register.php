<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo asset('css/styles.css') ?>"/>
        <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
        <meta name="viewport" content="width-device-width, initial-scale = 1.0">

        <!-- adding library for icons for top right -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

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

        <div class="signup-f">
            <form class="register" action="<?php echo url('register');?>" method="post">
                <?php echo csrf_field(); ?>
                <h1>Register</h1>

                <label for="name">Name:</label> <br>
                <input type="text" name="name" value="<?php echo isset($errors)? old('name') : ''; ?>"required><br>
                <label for="email">Email:</label><br>
                <input type="email" name="email" value="<?php echo isset($errors)? old('name') : ''; ?>"required><br>
                <label for="password">Password:</label><br>
                <input type="password" name="password" required><br>
                <label for="password_confirmation">Confirm password:</label><br>
                <input type="password" name="password_confirmation" required><br>

                <button type="submit">Register</button><br>



            

            </form>
        </div>
    </body>
</html>