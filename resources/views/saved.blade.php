<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/saved.css')}}">
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?
     family=Material+Icons">   

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Saved</title>
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
                    <h4 class="path-name">Art Store / Saved</h4>
                </div>
                <div class="profile-container">
                    <a href=""><i class="fa-solid fa-user" style="color: #8A191D;"></i> {{Auth::user()->name}}</a>
                    {{-- <a href=""><i class="fa-solid fa-user-plus" style="color: #8A191D;"></i> Register</a> --}}
                </div>
            </div>
            <div class="content">
                <div class="content-1">
                    <div class="category-title">Saved Artworks</div>

                    <div class="categories">
                        
                        <div class="row1">
                            @foreach($saveds as $saved)
                                    <div class="col1-4">
                                        <img src="{{ url('/images/arts/'.$saved->art->image) }}">
                                        <div class="details">
                                            <div class="names">
                                                <h4 class="name">{{$saved->art->name}}</h4>
                                                <h5 class="price">Rs. {{$saved->art->price}}</h5>
                                            </div>
                                            <div class="buttons">
                                                <a href="/">DETAILS</a>
                                                <form action="{{route('add')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="artid" value="{{$saved->art->id}}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button class="add" name="button" value="cart"><i class="fa-solid fa-cart-plus"></i></button>
                                                    <button class="add" name="button" value="remove"><i class="fa-solid fa-heart-circle-xmark"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                            @endforeach
                            
                        </div>
                        
                        
                    </div>
                </div>
                
            </div>
            {{-- <div class="links">
                {{$arts->links()}}
            </div> --}}
            
        </div>
    </div>
    
</body>
</html>