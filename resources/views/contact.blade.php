<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('css/contact1.css')}}">
    <title>Contact Us</title>
</head>
<body>
    <div class="whole-container">
        <div class="side-menubar">
            <div class="sm-logo">Art Store</div>
            <div class="side-menu">
                <a href="{{route('home')}}"><i class="fa-solid fa-house"></i>Home</a>
                <a href="{{route('explore')}}"><i class="fa-regular fa-compass"></i>Explore</a>
                <a href="{{route('saved')}}"><i class="fa-regular fa-heart"></i>Saved</a>
                <a href="{{route('cart')}}"><i class="fa-solid fa-cart-shopping"></i>Cart</a>
                <a href="profile.html"><i class="fa-regular fa-user"></i>Profile</a>
                <a href="purchase_history.html"><i class="fa-solid fa-clock-rotate-left"></i>Purchase History</a>
                <a href="contact.html"><i class="fa-regular fa-message"></i>Contact us</a>
                <a href="setting.html"><i class="fa-solid fa-gear"></i>Setting</a>
            </div>
        </div>
        <div class="main-container">
            <div class="navbar-container">
                <div class="path">
                    <h4 class="path-name">Kalaa / Contact</h4>
                </div>
                <div class="profile-container">
                    @if (Auth::check())
                        <a href="{{route('edit')}}"><i class="fa-solid fa-user"></i> {{ Auth::user()->name}}</a>
                        <a href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    @else
                        <a href="{{route('login')}}"><i class="fa-solid fa-user" style="color: #8A191D;"></i> Login</a>
                        <a href="{{route('signup')}}"><i class="fa-solid fa-user-plus" style="color: #8A191D;"></i> Register</a>
                    @endif
                </div>
            </div>
            <div class="note">
                <div class="title"><i class="fa-solid fa-circle-info"></i> Contact Kalaa!</div>
                <div class="details">
                    Reach us through any of the following means. We are always ready to help you with any queries you have about our site.
                    <ul class="info">
                        @foreach ($user as $u)
                            <li class="contact-details"><i class="fa-solid fa-envelope icon"></i> {{$u->email}}</li>
                            <li class="contact-details"><i class="fa-solid fa-phone icon"></i>{{$u->contact}}</li>
                            <li class="contact-details"><i class="fa-solid fa-location-dot icon"></i> Paknajol, Kathmandu</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>