<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalaa</title>
  <link rel="shortcut icon" type="image" href="{{ asset('images/homepage/logo.png') }}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nanum Myeongjo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Urbanist">
  <!-- bootstrap links -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

  <!-- bootstrap links -->
  <!-- fonts links -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
  <!-- fonts links -->
  <!-- icons links -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <!-- icons links -->
</head>

<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-md" id="navbar">
    <!-- Brand -->
    <a class="navbar-brand" href="#" id="logo"><img src="{{asset('images/homepage/mainlogo.png')}}" alt="" width="30px"
        style="margin-bottom: 10px; margin-right: 10px;">Kalaa</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span><img src="{{asset('images/homepage/menu.png')}}" alt="" width="20px"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link" href="#">Category</a> --}}
          <li class="dropdown"><a href="/" class="dbutton nav-link">Category</a>
            <div class="drop-content">
                <a href="{{route('home')}}" id="colo">Glass Painting</a>
                <a href="{{route('home')}}" id="colo">Pencil Sketch</a>
                <a href="{{route('home')}}" id="colo">Painting</a>
            </div>
    </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
      </ul>

    </div>
    <div class="icons">

      @if(Auth::check() && Auth::user()->usertype=='artist')
      <a href="{{route('edit')}}"><img src="{{asset('images/homepage/user.png')}}" alt="" width="20px"></a>
      @elseif(Auth::check() && Auth::user()->usertype=='admin')
      <a href="{{route('allusers')}}"><img src="{{asset('images/homepage/user.png')}}" alt="" width="20px"></a>
      @elseif(Auth::check() && Auth::user()->usertype=='customer')
      <a href="{{route('orders')}}"><img src="{{asset('images/homepage/user.png')}}" alt="" width="20px"></a>
      @else
      <a href="{{route('login')}}"><img src="{{asset('images/homepage/user.png')}}" alt="" width="20px"></a>
      @endif

      @if(Auth::check() && Auth::user()->usertype=='customer')
      <a href="{{route('cart')}}"><img src="{{asset('images/homepage/shopping-cart (3).png')}}" alt="" width="20px"></a>
      @elseif(Auth::check() && Auth::user()->usertype=='artist')
      <a href="{{route('artist.orders')}}"><img src="{{asset('images/homepage/shopping-cart (3).png')}}" alt="" width="20px"></a>
      @elseif(Auth::check() && Auth::user()->usertype=='admin')
      <a href="{{route('allorders')}}"><img src="{{asset('images/homepage/shopping-cart (3).png')}}" alt="" width="20px"></a>
      @else
      <a href="{{route('login')}}"><img src="{{asset('images/homepage/shopping-cart (3).png')}}" alt="" width="20px"></a>
      @endif
      
      @if(Auth::check())
      <a href="{{route('logout')}}"><img src="{{asset('images/homepage/logout.png')}}" alt="" width="20px"></a>
      @endif
    </div>
  </nav>

  <!-- navbar -->

  <!-- home section -->
  <!-- <section class="home" id="home">

    <div class="content">
      <h3>The Biggest Sale
      </h3>
      <h2>Category <span class="changecontent"></span></h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, voluptatem
        <br>Lorem ipsum dolor sit amet.
      </p>
      <h5>50% OFF</h5>
      <a href="#" class="btn">Add Cart</a>

    </div>
    <div class="img">
      <img src="{{asset('images/homepage/background.png')}}" alt="">
    </div>
  </section> -->
  <!-- home section -->

  <!-- cards -->
  <h1 id="category-title" class="text-center">Kalaa: An Online Art Store</h1>
  <!-- cards -->

  <!-- product cards -->
  <div class="container" id="product-cards">
    @php
        $count = 1;
    @endphp
    
    <div class="row" style="margin-top: 50px;">
      @foreach($arts as $art)
      @if($art->stock!=0)
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{ url('/images/arts/'.$art->image) }}" alt="">
          <div class="overlay">
            {{-- <a href="{{route('product',$art->id)}}" --}}
          {{-- <button type="button" onclick="window.location='{{route('product',$art->id)}}'" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button> --}}
          {{-- </a> --}}
          <a href="{{route('product',$art->id)}}" id="bord" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" style="outline:none; border:none" alt=""
            width="30px"></i></a>
            <form action="{{route('add',$art->id)}}" method="post">
              @csrf
              <input type="hidden" name="artid" value="{{$art->id}}">
              <input type="hidden" name="quantity" value="1">
              <button type="submit" name="button" value="cart" id="bord" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
            </form>
            {{-- <a href="{{route('add',$art->id)}}" id="bord" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
              width="30px"></i></a> --}}
          </div>
          <div class="card-body">
            <h3 class="text-center">{{$art->name}}</h3>
          <div class="star text-center">
				    <br>
          </div>
            <h5>Rs. {{$art->price}} <span><i><img src="{{asset('images/homepage/add.png')}}" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
      @php
        $count++;
      @endphp
      @endif
    
    
    @if($count==5)
    </div>
    <div class="row" style="margin-top: 50px;">
    @elseif($count==9)
      @break
    @endif
    @endforeach
    <div class="see-more-container">
      <div class="see-more-btn">
        <label>See More</label>
      </div>
    </div>
  </div>
</div>
  <!-- product cards -->

  <!-- about us -->
  <div class="container" id="about">
    <h2>ABOUT US</h2>
    <hr>
    <p style="text-align:justify;">Welcome to our art store, where creativity finds its home! We are passionate about art and dedicated to providing you with a vibrant collection of masterpieces that inspire and captivate. From stunning paintings and sculptures to exquisite prints and unique handmade crafts, our curated selection showcases the talent of artists from around the world. Whether you're an art enthusiast or a collector, we invite you to explore our diverse range of artistic treasures and let your imagination soar. Embrace the beauty of art with us and bring a touch of creativity into your life.</p>

  </div>
  <hr>
  <!-- about us -->

  <!-- contact us -->
  <div class="container" id="contact">
    <h2>CONTACT US</h2>
    <hr>
    <div class="row">
      <div class="col-md-4 py-3 py-md-0">
        <img src="location.png" alt="" width="60px">
        <p>Paknajol,Kathmandu, Nepal
        </p>
      </div>

      <div class="col-md-4 py-3 py-md-0">
        <img src="phone.png" alt="" width="60px">
        <p>+9779854187409
        </p>
      </div>

      <div class="col-md-4 py-3 py-md-0">
        <img src="email.png" alt="" width="60px">
        <p>info@kalaa.com
        </p>
      </div>
    </div>


  	</div>

  </div>
  <!-- contact us -->

  <!-- footer -->
  <footer id="footer" style="margin-top: 50px;">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <a href="#"><img src="{{asset('images/homepage/mainlogo.png')}}" alt="" width="32px">Kalaa</a>
            <p>
              Kathmandu <br>
              Nepal <br><br>
              <strong>Phone:</strong> +9779854187409 <br>
              <strong>Email:</strong> info@kalaa.com <br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contact Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Abstract Art</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Color-Painting</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Glass-Painting</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Network</h4>
            
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>


        </div>


      </div>
    </div>
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Kalaa</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>
  <!-- footer -->

  <a href="#" class="arrow"><i><img src="{{asset('images/homepage/arrow.png')}}" alt=""></i></a>

  
</body>
<script>

  function showerr(){
    if({{ $errors->any() }}) {
          alert("Product Added to Cart Successfully!");
          // // const $v = "'"+{{ implode('', $errors->all()) }}+"'";
          // const $v = new String({{ implode('', $errors->all()) }})
          // // alert({{ implode('', $errors->all()) }});
          // alert($v);
      }
  }
  window.onload= showerr;
</script>
</html