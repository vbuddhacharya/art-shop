<!DOCTYPE html>
<html>
<head>
  <title>Arts|Order</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/orderform.css') }}">

  <link rel="shortcut icon" type="image" href="logo.png">
  <!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
  <!-- bootstrap links -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nanum Myeongjo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Urbanist">

  
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

  <!-- navbar -->


<!-- Order Form Start -->
    <div class="container-box">
        <div class="art-image">
        <img src="{{ asset('images/art/1.jpg') }}" alt="Chosen Art">
        </div>

        <form>
            <h1>Place your Order Here</h1>
            <table cell-padding="0" cell-spacing="0" class="mytable">
                <tr>
                    <div class="form-group">
                        <td>
                            <label for="location" class="larger-cell">Delivery Location</label>
                        </td>
                        <td>
                            <input type="text" id="location" required>
                        </td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <td>
                            <label for="contact" class="larger-cell">Contact</label>
                        </td>
                        <td>
                            <input type="text" id="contact" required>
                        </td>
                    </div>
                </tr>
   
                <tr>
                    <div class="form-group">
                        <td>
                            <label for="price" class="larger-cell">Total Price</label>
                        </td>
                        <td>
                            <input type="text" id="price" value="1000" readonly>
                        </td>
                    </div>
                </tr>

                <tr>
                    <div class="form-group">
                        <td>
                            <label for="delivery-charge" class="larger-cell">Delivery Charge</label>
                        </td>
                        <td>
                            <input type="text" id="delivery-charge" value="100" readonly>
                        </td>
                    </div>
                </tr>

                <tr>
                    <div class="form-group">
                        <td>
                            <label for="total" class="larger-cell">Grand Total</label>
                        </td>
                        <td>
                            <input type="text" id="total" value="1100" readonly>
                        </td>
                    </div>
                </tr>
            </table>

            <div class="buttons">
                <input type="submit" value="Confirm" class="confirm">
                <input type="reset" value="Cancel" class="cancel">
            </div>

        </form>
    </div>



    
  <!-- footer -->
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
  <!-- footer -->
</body>
</html>
