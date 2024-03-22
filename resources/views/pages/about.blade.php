@extends('layouts.default')
@section('title', 'About Us')
@section('additionalHead')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
@endsection

@section('content')
    <div class="container">
        <div class="about-head">
            <h1>Welcome to The Jewellery Store </h1>
            <p>
                Our mission is to redefine your online jewellery shopping experience.
                Discover the epitome of excellence in every piece and enjoy a journey that reflects our dedication to
                your satisfaction.
            </p>
        </div>
        <div class="about-we">
            <h1>Who we are</h1>
            <p>
                Welcome to The Jewellery Store, launched in 2023 by a team of esteemed experts dedicated to offering
                high-quality jewellery at affordable prices.
                With stores conveniently located throughout the UK, we strive to make exquisite jewellery accessible to
                customers across the country.
                For those unable to visit our physical stores, our website provides a seamless platform to effortlessly
                place orders and bring the brilliance of our collections to your doorstep.
            </p>

        </div>

        <div class="Swiper-container">
            <div class="about-text">
                <h3 style="text-align: justify;">
                    Join us on this exciting journey as we redefine the online jewellery shopping experience, reflecting
                    our passion for excellence in every aspect of our brand.
                </h3>

            </div>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide"><img src="/images/homepage/ring.jpg" alt="Rings" class="aboutImg"></div>
                    <div class="swiper-slide"><img src="/images/homepage/watch.jpg" alt="Watches" class="aboutImg">
                    </div>
                    <div class="swiper-slide"><img src="/images/homepage/necklace.jpg" alt="Necklaces" class="aboutImg">
                    </div>
                    <div class="swiper-slide"><img src="/images/homepage/braceletIMG.jpg" alt="Bracelets"
                                                   class="aboutImg"></div>

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>


            </div>


        </div>
        <br>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

        <script>
            const swiper = new Swiper('.swiper', {


                loop: true,

                autoplay: {
                    delay: 2000, // Set the delay between slides in milliseconds
                },

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',

                },

            });
        </script>
        <div class="newsletter">
            <form action="">
                <h3>Unlock Exclusive Benefits: Subscribe to Our Newsletter Today!</h3>
                <h4>Be the First to Know About Irresistible Offers </h4>
                <h4>Discover New Arrivals in Exquisite Jewelry Collections </h4>
                <h4>Gain Insider Access to Limited Edition Pieces </h4>
                <div class="email-n">
                    <i class="fa fa-envelope"></i>
                    <input class="n-box" type="email" name="email" placeholder="Enter your email">
                    <button class="n-button" type="button">Subscribe</button>
                </div>
            </form>
        </div>
    </div>

@endsection
