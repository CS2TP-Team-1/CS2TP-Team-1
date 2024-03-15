<div class="icons">
    <ul>

        <li class="account">
            <a href="/basket"><i class="fa fa-shopping-basket" style="color: rgb(221, 160, 221);"></i></a>
        </li>

        <li class="account">
            <a href="/account"><i class="fa fa-user" style="color: rgb(221, 160, 221);"></i></a>
        </li>

        <!--log in/ log out button page -->
        <li class="account">
{{--            Admin Dashboard Access Button - Only displayed when logged in using admin account--}}
            @if(\Illuminate\Support\Facades\Auth::check() &&\Illuminate\Support\Facades\Auth::user()->accountType === 1)
                <div>
                    <button class='login' onclick="location.href='/admin'">Admin Dashboard</button>
                </div>
            @endif

            <div>
                @if (\Illuminate\Support\Facades\Auth::check())
                <form action="{{ url("/logout") }}" method="post">
                    @csrf
                    <button type="submit" class="login" value="Logout">Logout</button>
                </form>
                @else
                <button class='login' onclick="location.href='/login'">Login</button>
                @endif
            </div>
        </li>

        <li class="header">
            <img src="/logo.png" alt="The Jewellery Store Logo" width="45">
            <h1>The Jewellery Store</h1>
        </li>

    </ul>
</div>

<nav class="main-header">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/products">Products</a></li>
        <li><a href="/about">About Us</a></li>
        <li><a href="{{route('contact-form')}}">Contact Us</a></li>
    </ul>
</nav>

