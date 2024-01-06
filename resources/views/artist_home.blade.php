<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artist Dashboard</title>
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?
    family=Material+Icons">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/artist_home.css')}}">

    <style>
         .slider-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: auto;
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
        }

        .slide img {
            width: 50%;
            height: 60vh;
        }

        .navigation {
            position: absolute;
            top: 50%;
right:24%;
            width: 52%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .prev-btn, .next-btn {
            font-size: 24px;
            padding: 8px;
            margin: 0 10px;
            cursor: pointer;
            background-color: #5C5C5C;
            color: white;
            border: none;
            opacity:0.7;
        }
    </style>

</head>
<body>

    <div class="side-menubar">
        <div class="sm-logo">Kalaa</div>
        <div class="side-menu">
            <a href="{{route('artist.home')}}"><i class="fa-solid fa-house"></i>Dashboard</a>
            <a href="{{route('allorders')}}"><i class="fa-solid fa-cart-shopping"></i>Orders</a>
            <a href="{{route('allusers')}}"><i class="fa-solid fa-users"></i>Customers</a>
            <a href="{{route('allartists')}}"><i class="fa-solid fa-palette"></i>My Arts</a>
            <a href="{{route('artist.feature')}}"><i class="fa-solid fa-font-awesome"></i>Feature</a>
            <a href="{{route('upload')}}"><i class="fa-solid fa-upload"></i>Upload</a>
            <a href="{{route('artist.home')}}"><i class="fa-solid fa-user"></i>Profile</a>
        </div>
    </div>
    <main class="main-section">
        <div class="path-title">Artist \ Dashboard</div>
        <section id="welcome">
        @if(Auth::check() && Auth::user()->user_type=="artist")
            <span class="welcome-text">Welcome {{Auth::user()->username}}!</span>
        @endif

        </section>
        <center>
        <section id="at-glance">
        <span class="glance-text">FEATURED ARTS</span><br>
        <div class="slider-container">
    <div class="slides">
        
            <div class="slide"><img src="{{asset('images/art/1.jpg')}}" alt="Image 1"></div>
            <div class="slide"><img src="{{asset('images/art/2.jpg')}}" alt="Image 2"></div>
            <div class="slide"><img src="{{asset('images/art/3.jpg')}}" alt="Image 3"></div>
        
    </div>
    <div class="navigation">
        <button class="prev-btn" onclick="moveSlide(-1)">&#9665;</button>
        <button class="next-btn" onclick="moveSlide(1)">&#9655;</button>
    </div>

</div>
        </section>
        </center>

        <section id="products">
            <div class="orders container">
                <div class="sec-title">Latest Orders</div>
                <div class="orders-data table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Customer</th>
                                <th>Location</th>
                                <th>Contact</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                        @if($user)
                            <tr>
                                <td>{{$order->status}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->contact}}</td>
                                <td>{{$order->location}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->art->name}}</td>
                            </tr>
                            @else
                                <tr>No data available.</tr>
                            @endif
                            @endforeach      
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="top">
                <div class="sec-title">
                    Most Ordered
                </div>
                <div class="top-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pic">Item</th>
                                <th>Item Name</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tops as $top)
                            <tr>
                                <td class="pic"><img src="{{ url('/images/arts/'.$top->image) }}" alt="Product Image"></td>
                                <td>{{$top->name}}</td>
                                <td>{{$top->order_count}}</td>
                                
                            </tr>
                            @endforeach        
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>


    <script>
    let slideIndex = 0;

function moveSlide(n) {
    const slides = document.querySelectorAll('.slide');
    slideIndex += n;

    if (slideIndex > slides.length - 1) {
        slideIndex = 0;
    } else if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    }

    const percentage = slideIndex * -100;
    document.querySelector('.slides').style.transform = `translateX(${percentage}%)`;
}
</script>
</body>
</html>