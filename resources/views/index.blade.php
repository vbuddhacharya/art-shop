<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Art Shop</title>
  <link rel="shortcut icon" type="image" href="logo.png">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
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

  <!-- home section -->
  <section class="home" id="home">

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
  </section>
  <!-- home section -->

  <!-- cards -->
  <h1 id="category-title" class="text-center">Buy Art Online</h1>
  <!-- cards -->

  <!-- product cards -->
  <div class="container" id="product-cards">
    <div class="row" style="margin-top: 50px;">
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/buddha2.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="views.png" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Wishlist"><i><img src="heart.png" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="add carts.png" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Buddha</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$100.50 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/obito.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Obito</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$150.50 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/mountain-landscape.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Mountain</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$500.10 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/wall-decor1.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Abstract Art</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$300.20 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="margin-top: 50px;">
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/mountain1.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Mountain</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$100.50 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/ganesh.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Ganesh</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$50.50 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/naruto.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Naruto</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$500.10 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/buddha3.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Buddha</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$300.20 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="margin-top: 50px;">
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/glasspainting1.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Hoodies</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$150.50 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>

      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/mountain3.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Mountain</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$200.30 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>

      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/acrylic1.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Hoodies</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$500.10 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>

      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/wall-decor2.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Sun Moon</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$100.20 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
    </div>

	<div class="row" style="margin-top: 50px;">
	  <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/butterfly.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Butterfly</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$500.10 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
	  <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/glasspainting2.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Luffy</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$500.10 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
	  <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/wall-decor1.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Abstract Art</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$500.10 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
	  <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/glasspainting3.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Naruto</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$500.10 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>

    <div class="row" style="margin-top: 50px;">
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/ganesh2.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Ganesh</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$100.50 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/narutoeyes.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Naruto</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$150.50 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/wall-decor3.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Boho</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$500.10 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img class="img-size" src="{{asset('images/homepage/mountain2.jpg')}}" alt="">
          <div class="overlay">
            <button type="button" class="btn btn-secondary" title="Quick Shop"><i><img src="{{asset('images/homepage/views.png')}}" alt=""
                  width="30px"></i></button>
            <button type="button" class="btn btn-secondary" title="Add to Cart"><i><img src="{{asset('images/homepage/add carts.png')}}" alt=""
                  width="30px"></i></button>
          </div>
          <div class="card-body">
            <h3 class="text-center">Mountain</h3>
            <div class="star text-center">
				<br>
            </div>
            <h5>$500.10 <span><i><img src="add.png" alt="" width="20px"></i></span></h5>
          </div>
        </div>
      </div>

    <div class="see-more-container">
      <div class="see-more-btn">
        <label>See More</label>
      </div>
    </div>
  </div>
  <!-- product cards -->

  <!-- about us -->
  <div class="container" id="about">
    <h2>ABOUT US</h2>
    <hr>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab fuga id sed voluptas, sunt tempora iure provident
      hic ad natus? Doloremque fugiat maiores ipsam vero nemo aut! A cum impedit provident magnam corporis iste
      repudiandae rem laboriosam veritatis incidunt, sequi voluptates facere maxime ipsa, nulla enim assumenda
      reprehenderit itaque. Est velit natus, tenetur nisi excepturi molestiae veniam iure odio aliquam exercitationem ab
      dicta a accusamus vero delectus nostrum ex maiores voluptatum facilis? At quis possimus expedita porro atque sed
      voluptatibus deleniti et repellat eum. Ut natus, architecto tempora sit, qui facilis ipsam quis quasi veritatis
      aliquid, odit aliquam optio dolorem.</p>

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
        <p>Kathmandu, Nepal
        </p>
      </div>

      <div class="col-md-4 py-3 py-md-0">
        <img src="phone.png" alt="" width="60px">
        <p>+0000000000000000
        </p>
      </div>

      <div class="col-md-4 py-3 py-md-0">
        <img src="email.png" alt="" width="60px">
        <p>example@gmail.com
        </p>
      </div>
    </div>
    <hr>
    <div class="row">

      <div class="col-md-6 py-3 py-md-0">

        <div class="form-group">
          <input type="text" class="form-control" id="usr" placeholder="Your Name">
        </div>
        <div class="form-group">
          <input type="phone" class="form-control" id="phn" placeholder="Your Phone Number">
        </div>
      </div>

      <div class="col-md-6 py-3 py-md-0">

        <div class="form-group">
          <input type="email" class="form-control" id="eml" placeholder="Your Email">
        </div>
        <div class="form-group">
          <input type="subject" class="form-control" id="sbj" placeholder="Subject">
        </div>
      </div>

    </div>
    <div class="form-group">
      <textarea class="form-control" rows="5" id="comment" placeholder="Type your Message"></textarea>

    </div>
    <div id="message"><button>Send Message</button></div>

  	</div>

  </div>
  <!-- contact us -->

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

  <a href="#" class="arrow"><i><img src="arrow.png" alt=""></i></a>


</body>

</html