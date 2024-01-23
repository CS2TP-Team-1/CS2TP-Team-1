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

</body>

</html>
