<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?
     family=Material+Icons">   
    <title>Art Store</title>
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
                <a href="{{route('orders')}}"><i class="fa-solid fa-clock-rotate-left"></i>Orders</a>
                <a href="contact.html"><i class="fa-regular fa-message"></i>Contact us</a>
                <a href="setting.html"><i class="fa-solid fa-gear"></i>Setting</a>
            </div>
        </div>
        <div class="main-container">
            <div class="navbar-container">
                <div class="path">
                    <h4 class="path-name">Art Store / Home</h4>
                </div>
                <div class="profile-container">
                    <a href="{{route('login')}}"><i class="fa-solid fa-user" style="color: #8A191D;"></i> Login</a>
                    <a href="{{route('signup')}}"><i class="fa-solid fa-user-plus" style="color: #8A191D;"></i> Register</a>
                </div>
            </div>
            <div class="content">
                <div class="content-1">
                    <div class="banner-container-1">
                        <div class="banner-1">
                            <img src="/images/banner.png" alt="Banner">
                        </div>
                    </div>
                    <div class="deals">
                        <div class="daily-deals-title">Featured <a href="">View all<i class="fa-solid fa-arrow-right"></i></a></div>

                        <div class="daily-deals-container">
                            @foreach ($arts as $art)
                            <div class="daily-deals">
                                <div class="daily-deals-img">
                                    <img src="{{ url('/images/arts/'.$art->image) }}">
                                    
                                </div>
                                <div class="daily-deals-headings">
                                    <div class="daily-deals-h1">{{$art->name}}</div>
                                    <div class="daily-deals-price">
                                        <div class="price1">Rs. {{$art->price}}</div>
                                    </div>
                                    <a href="/" class="deets">DETAILS</a>
                                </div>
                                <div class="add-icons"></div>
                            </div>  
                            @endforeach
                            
                        </div>
                    </div>
                    
                    
                </div>
                <div class="content-2">

                    
                    <div class="category-title">Explore Categories <a href="">See all<i class="fa-solid fa-arrow-right"></i></a></div>

                    {{-- <div class="categories"> --}}
                        {{-- <div class="sub-category"> --}}
                            <div class="row1">
                            <div class="col1-4">
                                <img src="/images/pencil.png">
                                {{-- <div class="middle">
                                    <div class="more">View All</div>
                                </div> --}}
                                <div class="details">
                                    <div class="names">                                           
                                        <h4 class="name">Pencil Arts</h4>
                                    </div>
                                </div>
                                        
                            </div>
                            <div class="col1-4">
                                <img src="/images/acrylic.png">
                                <div class="details">
                                    <div class="names">                                           
                                        <h4 class="name">Acrylic Painting</h4>
                                    </div>
                                </div>
                                        
                            </div>
                            <div class="col1-4">
                                <img src="/images/water.png">
                                <div class="details">
                                    <div class="names">                                           
                                        <h4 class="name">Watercolor</h4>
                                    </div>
                                </div>
                                        
                            </div>
                            <div class="col1-4">
                                <img src="/images/color.png">
                                <div class="details">
                                    <div class="names">                                           
                                        <h4 class="name">Color Pencil</h4>
                                    </div>
                                </div>
                                        
                            </div>
                            <div class="col1-4">
                                <img src="/images/others.png">
                                <div class="details">
                                    <div class="names">                                           
                                        <h4 class="name">Others</h4>
                                    </div>
                                </div>
                                        
                            </div>
                            
                        </div>
                    {{-- </div> --}}
                        {{-- <div class="sub-category">b</div>
                        <div class="sub-category">c</div>
                        <div class="sub-category">d</div> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>