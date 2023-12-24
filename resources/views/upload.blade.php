<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Arts|Upload</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/upload.css') }}">

    <link rel="shortcut icon" type="image" href="logo.png">
  <!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
  <!-- bootstrap links -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nanum Myeongjo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Urbanist">

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
      <img src="{{asset('images/homepage/search.png')}}" alt="" width="16px">
      <img src="{{asset('images/homepage/user.png')}}" alt="" width="20px">
      <img src="{{asset('images/homepage/shopping-cart (3).png')}}" alt="" width="20px">
    </div>
  </nav>

  <!-- navbar -->


<!-- upload form -->
  <div class="container-box">
    <h1>Share Your Creative Works</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="artTitle" class="artlabel">Art Title</label>
            <input type="text" id="artTitle" name="artTitle" placeholder="Enter Art Title" required>
        </div>
        <div class="form-img">
  <label for="artImage" class="artimg">Art Image</label>
  <span class="file-input">
    <input type="file" id="myFile" name="myFile" onchange="showFileName(this)">
    <label for="myFile">Choose File</label>
    <span id="file-name"></span>

  </span>
</div>

        
        <div class="form-row">
            <div class="form-group">
                <label for="artSize" class="artlabel">Art Size</label>
                <input type="text" id="artSize" name="artSize" placeholder="Enter Art Size" required>
            </div>
            <div class="form-group" style="margin-left: 10vh;">
                <label for="artPrice" class="artlabel">Art Price</label>
                <input type="number" id="artPrice" name="artPrice" min="0" step="50" value="50" required>
            </div>

        </div>

        <div class="form-row-group">
            <div class="form-group">
                <label for="artMaterial" class="artlabel">Art Material</label>
                <select id="artMaterial" name="artMaterial"  style="width: 30vh">
                    <option value="paper">Paper</option>
                    <option value="glass">Glass</option>
                    <option value="canvas">Canvas</option>
                </select>
            </div>
            <div class="form-group" style="margin-left: 10vh;">
                <label for="artCategory" class="artlabel">Art Category</label>
                <select id="artCategory" name="artCategory" style="width: 31.5vh" required>
                    <option value="coloredPencil">Color Pencil</option>
                    <option value="pencilSketch">Pencil Sketch</option>
                    <option value="oilPaint">Oil Paint</option>
                    <option value="acrylicPaint">Acrylic Paint</option>
                    <option value="watercolor">Watercolors</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="artDescription" class="artlabel">Art Description</label>
            <textarea id="artDescription" name="artDescription" placeholder="Provide Proper Art Description" required></textarea>
        </div>
     
        <div class="form-row">
            <div class="form-group">
                <label for="artStock" class="artlabel">Art Stock</label>
                <input type="number" id="artStock" name="artStock" min="1" max="5" step="1" value="1" required>
            </div>
            <div class="form-group" style="margin-left: 10vh;">
                <label for="artDeliver" class="artlabel">Delivery Time</label>
                <input type="text" id="artDeliver" name="artDeliver" placeholder="Enter Delivery Time" required>
            </div>
        </div>
        <br/>
        <div class="form-group">
            <div class="radio-group">
                <label for="frameIncluded" class="artlabel">Include Frame?</label>
                <input type="radio" id="yes" name="radioField" value="yes"  style="font-weight: 100px;" required>
                <label for="yes">Yes</label>
                <input type="radio" id="no" name="radioField" value="no" required>
                <label for="no">No</label>
                
            </div>
        </div>

        <input type="submit" value="Upload">
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


<script>
    function showFileName(input) {
  var fileName = input.files[0].name;
  document.getElementById("file-name").textContent = fileName;
}

</script>

</body>
</html>