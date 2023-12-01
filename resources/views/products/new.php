<!DOCTYPE html>
<html>
<head>
        <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <link rel = "stylesheet" type="text/css" href="<?php echo asset('css/styles.css')?>" />

    <!-- adding library for icons for top right -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>

<nav>
    <div id="nav-placeholder">

    </div>

    <script>
        $(document).ready(function(){
            $('#nav-placeholder').load('/navbar');
        });
    </script>
</nav>

<h1>Create a New Product</h1>

<form method="post" action="{{route('projects.store') }}">
    <label for="name">Product Name</label>
    <input type="text" name="name" placeholder="Product Name" required> </input>

    <label for="price">Price</label>
    <input type="number" name="price" placeholder="##.##" required> </input>

    <p>On promotion?</p>
    <label for="1">Yes</label>
    <input type="radio" value="1" name="promotion">
    <label for="0">No</label>
    <input type="radio" value="0" name="promotion">

    <p>Metal Type</p>
    <input list="metals">
    <datalist id="metals">
        <option value="Silver"></option>
        <option value="Gold"></option>
    </datalist>

    <p>Category</p>
    <input list="category">
    <datalist id="category">
        <option value="Earrings"></option>
        <option value="Necklaces"></option>
        <option value="Watches"></option>
        <option value="Bracelets"></option>
        <option value="Rings"></option>
    </datalist>
    <br>
    <label for="mainImage">Upload Main Product Image</label>
    <input type="file" id="mainImage" name="mainImage">
    <br>
    <input type="submit">



</form>


</body>

</html>
