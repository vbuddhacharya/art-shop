<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SANDUK</tITLE>

	 <link rel="icon" href="favicon.ico" type="image/ico" sizes="16x16"> 

<!--bootstrap CDN-->
<link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
 integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
 crossorigin="anonymous"/>


<!--Custom Stylesheet-->
<link rel="stylesheet" href="{{asset('css/1.css')}}"/>
 

    <!-- Css Styles -->
   
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    
   <link rel="stylesheet" href="css/product.css" type="text/css">
  

    <link rel="stylesheet" href="css/style.css" type="text/css">


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
			#footer {
   			        width:100%;
    			       /*position:absolute;
    			       bottom:0;
    			      left:0;*/
    			      background-color:#152238;
    			}


			.footer:before {
  			  clear: both;
  			  display: block;
   			 height: 120px;
    			min-height: 120px;
			}
</style>
</head>
<body>
<!--header-->
	<header>
			<nav class="navbar navbar-expand-lg navbar-light">
			<a href="homepage.html">
			<img src="pic/logo.png" style="width:90px; height:50px; float:left; //padding:10px">
			  </a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="file:///E:/sanduk/homepage.html"><i class="fa fa-fw fa-home"></i> HOME<span class="sr-only">(current)</span></a>
				  </li>
				  <div class="nav-item">
				  <li class="dropdown" style="margin-top:14px; color:white;">
				  <a href="javascript:void(0)" class="dropbtn" style="color: #fff"><i class="fa fa-fw fa-shopping-cart"></i> SHOP</a>
				  <div class="dropdown-content">
				  <a href="#">Men</a>
				   <a href="#">Women</a>
				    <a href="#">Shoes</a>
					</div>
				  </li>
				  </div>
				  <li class="nav-item">
					<a class="nav-link" href="rik/aboutus.html"><i class="fa fa-fw fa-address-card"></i> ABOUT US</a>
				  </li>
				   <li class="nav-item">
					<a class="nav-link" href="rik/contact.html"><i class="fa fa-fw fa-envelope"></i> CONTACT US</a>
				  </li>
				 
				   <li class="nav-item">
					<a class="nav-link" href="not.html" target="blank"><i class="fa fa-fw fa-shopping-cart"></i> SHOPPING CART</a>
				  </li>
				   <li class="nav-item">
					<a class="nav-link" href="not.html" target="blank" ><i class="fa fa-fw fa-heart"></i> FAVOURITES</a>
				  </li>
				  
				 
				 
				</ul>
			  </div>
			 
			
   <div class="col-md-4 col-12 text-right" >
					<p class="my-md-4 header-links" >
						<a href="{{route('login')}}" class="px-2" style="color:white;"><i class="fa fa-fw fa-user"></i> Log In</a>
						<a href="{{route('signup')}}" class="px-1" style="color:white;"><i class="fa fa-fw fa-user-plus"></i>Sign Up</a>
						
						
					</p>
				
			</nav>
		
		
	</header>
	<!--/header-->
	
	<!--main section-->

	<main>
			<div class="res">
		<!--first slider-->
		
<div class="container; padding:10">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
       <img src="{{asset('images/pic/b1.png')}}" alt="banner3" style="width:100%;">
      </div>

       <div class="item">
        <img src="pic/banner3.jpg" alt="banner3" style="width:100%;">
      </div>
    
    
      <div class="item">
        <img src="pic/shoban2.jpg" alt="banner3" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
		<!--/first slider-->
		
		

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="pic/MEN.PNG" alt="">
                        <div class="inner-text">
                            <a href="men/man.html">Men’s</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{asset('images/pic/WOMEN.jpg')}}" alt="">
                        <div class="inner-text">
                              <a href="reme/myshop.html">Women’s</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="pic/shoe.png" alt="">
                        <div class="inner-text">
                            <a href="san/shoes.html">Shoes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
 <!-- Banner Section End -->
<div class="container" id="products">
	<h2 style="color:#45ccb8"> Products: </h2>
	<div class="row" id="rows">
	<div class="col-md-3">
	<div class="product-top">
	<img src="pic/a3.jpg">
	<div class="overlay">
	<button type="button" class="btn btn-secondary" title="Quick Shop">
	<i class="fa fa-eye"></i></button>
	<button type="button" class="btn btn-secondary" title="Add to wishlist">
	<i class="fa fa-heart-o"></i></button>
	<button type="button" class="btn btn-secondary" title="Add to cart">
	<i class="fa fa-shopping-cart"></i></button>
	</div>
	</div>
	<div class="product-bottom text-center">
	 
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			
			<h3>Silk Top</h3>
			<h5>Rs.1500</h5>
	</div>
	</div>
	<div class="col-md-3">
	<div class="product-top">
	<img src="{{asset('pic/blag.jpg')}}">
	<div class="overlay">
	<button type="button" class="btn btn-secondary" title="Quick Shop">
	<i class="fa fa-eye"></i></button>
	<button type="button" class="btn btn-secondary" title="Add to wishlist">
	<i class="fa fa-heart-o"></i></button>
	<button type="button" class="btn btn-secondary" title="Add to cart">
	<i class="fa fa-shopping-cart"></i></button>
	</div>
	</div>
	<div class="product-bottom text-center">
	 
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<h3>Blazer</h3>
			<h5>Rs 5000</h5>
	</div>
	</div>
	<div class="col-md-3">
	<div class="product-top">
	<img src="pic/convf.jpg">
	<div class="overlay">
	<button type="button" class="btn btn-secondary" title="Quick Shop">
	<i class="fa fa-eye"></i></button>
	<button type="button" class="btn btn-secondary" title="Add to wishlist">
	<i class="fa fa-heart-o"></i></button>
	<button type="button" class="btn btn-secondary" title="Add to cart">
	<i class="fa fa-shopping-cart"></i></button>
	</div>
	</div>
	<div class="product-bottom text-center">
	 
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<h3>White high converse</h3>
			<h5>Rs.1800</h5>
	</div>
	</div>
	<div class="col-md-3">
	<div class="product-top">
	<img src="pic/q.jpg">
	<div class="overlay">
	<button type="button" class="btn btn-secondary" title="Quick Shop">
	<i class="fa fa-eye"></i></button>
	<button type="button" class="btn btn-secondary" title="Add to wishlist">
	<i class="fa fa-heart-o"></i></button>
	<button type="button" class="btn btn-secondary" title="Add to cart">
	<i class="fa fa-shopping-cart"></i></button>
	</div>
	</div>
	<div class="product-bottom text-center">
	 
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star-half-o"></i>
			<h3>Long coat</h3>
			<h5>Rs.1500</h5>
	</div>
	</div>
	
	</div>
	</div>
	 <p STYLE="TEXT-ALIGN:CENTER;"> <a class="nav-link" href="all/product.html"><i class="fa fa-fw fa-shopping-cart"></i>View More</a></p>
	</div>
	</main>
	
	<!--/main section-->
	<footer id="footer">
	<div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="#" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: NEW ROAD, KATHMANDU NEPAL</li>
                            <li>Phone: 01334234</li>
                            <li>Email: KTM.SANDUKH100@gmail.com</li>
                        </ul>
                        
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="rik/aboutus.html">About Us</a></li>
                            
                            <li><a href="rik/contact.html">Contact</a></li>
                            <li><a href="not.html" target="blank">Checkout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="rik/login.html?">My Account</a></li>
                            <li><a href="rik/contact.html">Contact</a></li>
                            
                            <li><a href="all/product.html">Shop</a></li>
							<li><a href="NOT.HTML" target="blank">Shopping Cart</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		
</footer>
	
	
		
	
</body>


</html>