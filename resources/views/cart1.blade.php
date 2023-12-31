<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <title>Your Cart</title>

    <link rel="shortcut icon" type="image" href="logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas Neue">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Urbanist">
    

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
  <!-- fonts links -->
  <!-- icons links -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
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
              <a class="nav-link" href="#">Category</a>
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
          {{-- <img src="{{asset('images/homepage/search.png')}}" alt="" width="16px"> --}}
          <img src="{{asset('images/homepage/user.png')}}" alt="" width="20px">
          <img src="{{asset('images/homepage/shopping-cart (3).png')}}" alt="" width="20px">
        </div>
      </nav>
    <main>
        <div class="main">
          {{-- @if($count == 0)
            <div class="cart">
              <div class="title">Cart Empty</div>
            </div>
          @else --}}
            <div class="cart">
                <div class="title">
                    Cart Items
                </div>
                <hr style="background-color: rgb(228, 197, 197);width:100%; margin-top:0px"">
                @if($count == 0)
              
                <div class="empty">Cart Empty</div>
              
              @else
                @foreach($carts as $cart)
                <a href="{{route('product',$cart->art_id)}}" style="text-decoration: none; color:initial">
                <div class="order">
                    <div class="pic">
                        <img src="{{ url('/images/arts/'.$cart->art->image) }}" alt="Product Image">
                    </div>
                    <div class="prod-detail">
                        <div class="det">
                            <div class="prod-title">{{$cart->art->name}}</div>
                            <div class="artist">{{$cart->art->user->name}}</div>
                            <div>{{$cart->art->category}}</div>
                            <div class="quan">Quantity: {{$cart->quantity}}</div>
                            <div>Delivery within {{$cart->art->time}}</div>
                        </div>
                        
                        <div class="side">
                            <div class="price">Rs. {{$cart->art->price}}</div>   
                            <form action="{{route('remove')}}" method="post">
                              @csrf
                              <input type="hidden" name="cartid" id="cartid" value="{{$cart->id}}">
                            
                              <button>Remove</button> 
                            </form>
                        </div>
                        
                    </div>
                </div>
              </a>
                @endforeach
                @endif
                {{-- <div class="order">
                    <div class="pic">
                        <img src="{{asset('images/art/2.jpg')}}" alt="Product Image">
                    </div>
                    <div class="prod-detail">
                        <div class="det">
                            <div class="prod-title">Abstract Art</div>
                            <div class="artist">ArtistCha</div>
                            <div>Embroidery</div>
                            <div class="quan">Quantity: 1</div>
                            <div>Delivery within 7 days</div>
                        </div>
                        
                        <div class="side">
                            <div class="price">Rs. 2000</div>   
                            <button>Remove</button> 
                        </div>
                        
                    </div>
                </div> --}}
                
            </div>
            <div class="total">
                <div class="title">
                    Cart Total
                </div>
                <hr style="background-color: rgb(228, 197, 197);width:100%; margin-top:0px">
                <div class="info">
                    <div class="tot tots"><span>Total</span><span>Rs. {{$sum}}</span></div>
                    <div class="shipping tots"><span>Delivery Charge</span> <span>{{$count}}x100</span></div>
                    <div class="tota tots"><span>Grand Total</span><span>Rs. {{$total}}</span></div>
                </div>
                
                <div class="buttons">
                  <form action="{{route('next')}}" method="post">
                  @csrf
                  {{-- <input type="hidden" name="cartid" value="{{$cart->id}}"> --}}
                  <button name="but" value="checkout">Checkout</button>
                  <button name="but" value="empty">Empty Cart</button>
                  </form>
                    
                </div>
            </div>
          {{-- @endif --}}
        </div>
    </main>
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
</html>