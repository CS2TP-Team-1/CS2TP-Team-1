<!--icons-->

<?php

use Illuminate\Support\Facades\Auth;

?>


<div class="icons">
    <ul>

        <!-- <li>
            <a href="#"><i class="fa fa-search" style="color: #9b26b6;"></i></a>
        </li> -->

        <li>
            <a href="/basket"><i class="fa fa-shopping-basket" style="color: #9b26b6;"></i></a>
        </li>

        <li>
            <a href="/profile"><i class="fa fa-user" style="color: #9b26b6;"></i></a>
        </li>

        <!--log in/ log out button page -->
        <li>
            <div>
                <?php
                if (Auth::check()) { ?>
                    <button class='logout' onclick="/logout">Log Out</button>
                <?php } else { ?>
                    <button class='login' onclick="/login">Login</button>
                <?php } ?>
            </div>
        </li>

        <li>
            <input type="text" placeholder="Search...">
            <input type="submit" value="Search"/>
        </li>
        <li2>
            <div class="logoimg">
                <img src="/logo.png" alt="The Jewellery Store Logo" height="400" width="500">
            </div>
        </li2>

    </ul>
</div>


<!-- nav bar -->
<nav class="main-header">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/products">Products</a></li>
        <li><a href="/about">About Us</a></li>
        <li><a href="/contact">Contact Us</a></li>
    </ul>
</nav>
