<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>

<header class="row">
    @include('includes.header')
</header>

<main id="main" class="row">
    @yield('content')
</main>

<footer class="row footer">
    @include('includes.footer')
</footer>
</body>

</html>
