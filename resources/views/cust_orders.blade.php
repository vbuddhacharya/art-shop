<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/order.css')}}">

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
    <title>Order History</title>
</head>
<body>
    <nav class="navbar navbar-expand-md" id="navbar">
        <!-- Brand -->
        <a class="navbar-brand" href="#" id="logo"><img src="logo.png" alt="" width="30px"
            style="margin-bottom: 10px; margin-right: 10px;">Art Shop</a>
    
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
          <img src="{{asset('images/homepage/search.png')}}" alt="" width="16px">
          <img src="{{asset('images/homepage/user.png')}}" alt="" width="20px">
          <img src="{{asset('images/homepage/shopping-cart (3).png')}}" alt="" width="20px">
        </div>
      </nav>
    <main>
        <div class="main">
            <div class="title-sec">
                <span class="main-title">
                    Order History
                    <hr style="width:90%; background-color:rgba(0, 0, 0,0.2); margin-top:2px" >
                </span>
                
            </div>
            <div class="orders">
                <div class="order">
                    <div class="product">
                        <img src="{{asset('images/homepage/buddha2.jpg')}}" alt="Product Image">
                    </div>
                    <div class="details">
                        
                        <div class="side">
                            <div class="title">Buddha's Blessing</div>
                            <div class="inf ord">Order #12</div>
                        </div>
                        <div class="info">
                            <div class="inf">Contact: 9823383030</div>
                            <div class="inf">Delivery Location: <span class="deet">NCCS College, Paknajol</span></div>
                            <div class="inf">Delivery Date: <span class="deet">10/7/2023</span></div>
                            <div class="inf">Status: <span class="deet">Processing</span></div>
                            <div class="inf total"><span class="deet">Rs.2100</span></div>
                            
                        </div>
                    </div>
                </div>
                <div class="order">
                    <div class="product">
                        <img src="{{asset('images/art/6.jpg')}}" alt="Product Image">
                    </div>
                    <div class="details">
                        
                        <div class="side">
                            <div class="title">Nezuko</div>
                            <div class="inf ord">Order #10</div>
                        </div>
                        <div class="info">
                            <div class="inf">Contact: 9823383030</div>
                            <div class="inf">Delivery Location: <span class="deet">NCCS College, Paknajol</span></div>
                            <div class="inf">Delivery Date: <span class="deet">6/7/2023</span></div>
                            <div class="inf">Status: <span class="deet">Completed</span></div>
                            <div class="inf total"><span class="deet">Rs.2000</span></div>
                            
                        </div>
                    </div>
                </div>
                <div class="order">
                    <div class="product">
                        <img src="{{asset('images/art/7.jpg')}}" alt="Product Image">
                    </div>
                    <div class="details">
                        
                        <div class="side">
                            <div class="title">Peace in the Village</div>
                            <div class="inf ord">Order #7</div>
                        </div>
                        <div class="info">
                            <div class="inf">Contact: 9823383030</div>
                            <div class="inf">Delivery Location: <span class="deet">NCCS College, Paknajol</span></div>
                            <div class="inf">Delivery Date: <span class="deet">1/7/2023</span></div>
                            <div class="inf">Status: <span class="deet">Completed</span></div>
                            <div class="inf total"><span class="deet">Rs.3000</span></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer id="footer" style="margin-top: 50px;">
        <div class="footer-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-6 footer-contact">
                <a href="#"><img src="logo.png" alt="" width="32px">Art Shop</a>
                <p>
                  Kathmandu <br>
                  Nepal <br><br>
                  <strong>Phone:</strong> +00000000000000 <br>
                  <strong>Email:</strong> info@art-Shop.com <br>
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
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates, veritatis.</p>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Sketch</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Color-Painting</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Glass-Painting</a></li>
                </ul>
              </div>
    
              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Social Network</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates, veritatis.</p>
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
            &copy; Copyright <strong><span>Art Shop</span></strong>. All Rights Reserved
          </div>
        </div>
      </footer>
</body>
</html>