<!doctype html>
<html>
	<head>
		<title>Login|Sanduk</title>
		 <link rel="icon" href="favicon.ico" type="image/ico" sizes="16x16"> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
		<!--bootstrap CDN-->
		<link rel="stylesheet"
		 href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		 integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
		 crossorigin="anonymous"/>
		<!--Font Awesome CDN-->
		<script src="https://kit.fontawesome.com/0c0bdf62e2.js" crossorigin="anonymous"></script>

		<!--Custom Stylesheet-->
		<link rel="stylesheet" href="{{asset('css/1.css')}}"/>
		 
			
       <!-- Css Styles -->
   
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    
   <link rel="stylesheet" href="{{asset('css/product.css')}}" type="text/css">
  

    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">

		<style>
			body{
				margin: 0;
				padding: 0;
				font-family: sans-serif;
				background-image: url(../pic/loginsignup.jpg);
				background-size: cover;
			}
			.box{
				margin:10px;
				position: relative;
				top: 60%;
				left: 34%;
				/*transform: translate(-50%,-50%);*/
				width: 400px;
				padding: 40px;
				padding-bottom:200px;
				background: rgba(0,0,0,.5);
				box-sizing: border-box;
				box-shadow: 0 15px 25px rgba(0,0,0,.5);
				border-radius: 10px;
			}
			.box h2{
				margin:0 0 30px;
				padding: 0;
				color: #fff;
				text-align:	center;
			}
			.box .inputbox{
				position: relative;
				
			}
			.box .inputbox input{
				width: 100%;
				padding: 10px 0;
				font-size: 16px;
				color: #fff;
				letter-spacing: 1px;
				margin-bottom: 30px;
				border: none;
				border-bottom: 1px solid #fff;
				outline: none;
				background: transparent;
				
			} 

			input[type=submit] {
				width: 100%;
				box-sizing: border-box;
				padding: 10px 0;
				margin-top: 30px;
				outline: none;
				border: none;
				background: #60adde;
				opacity: 0.7;
				border-radius: 20px;
				font-size: 20px;
				color: #fff;
			}
			input[type=submit]:hover{
				background: #003366;
				opacity:0.7;
			}
			#footer {
    width:100%;
    /*position:absolute;
    
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
	<body style="background-image:url(../pic/loginsignup.jpg)">
		<!--header-->
	<header>
			<nav class="navbar navbar-expand-lg navbar-light">

			
			  

			<a href="../homepage.html">
			<img src="../pic/logo.png" style="width:90px; height:50px; float:left; //padding:10px">
			  </a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
				   <li class="nav-item active">
					<a class="nav-link" href="../homepage.html"><i class="fa fa-fw fa-home"></i> HOME<span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="../all/product.html"><i class="fa fa-fw fa-shopping-cart"></i> SHOP</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="../rik/aboutus.html"><i class="fa fa-fw fa-address-card"></i> ABOUT US</a>
				  </li>
				   <li class="nav-item">
					<a class="nav-link" href="../rik/contact.html"><i class="fa fa-fw fa-envelope"></i> CONTACT US</a>
				  </li>
				 
				   <li class="nav-item">
					<a class="nav-link" href="../not.html" target="blank"><i class="fa fa-fw fa-shopping-cart"></i> SHOPPING CART</a>
				  </li>
				   <li class="nav-item">
					<a class="nav-link" href="../not.html" target="blank"><i class="fa fa-fw fa-heart"></i> FAVOURITES</a>
				  </li>
				 
				 
				</ul>
			  </div>
			 
			
   <div class="col-md-4 col-12 text-right" >
					<p class="my-md-4 header-links" >
						<a href="../rik/login.html" class="px-2" style="color:white;"><i class="fa fa-fw fa-user"></i> Log In</a>
						<a href="../rik/signup.html" class="px-1" style="color:white;"><i class="fa fa-fw fa-user-plus"></i>Sign Up</a>
						
					</p>
				
			</nav>
		
		
	</header>
	<!--/header-->
<main>
	<div class="res">
		<div class="box">
			<h2>Login</h2>

			<form action="../homepage.html" onsubmit="validate()">
				<div class="inputbox">

					<input type="text" name="" value="" placeholder="Username" id="username" required>



	
				</div>
	<div class="inputbox">
		<input type="password" name="" value="" placeholder="Password" id="password" required >
					
				</div>
				<input type="submit" name="" value="Submit">
			</form>
		</div>
		</div>
</main>
<div>
<div class="row"></div>
</div>
<footer id="footer"  style="margin-bottom:0px;">
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
                            <li><a href="../rik/aboutus.html">About Us</a></li>
                            
                            <li><a href="../rik/contact.html">Contact</a></li>
                            <li><a href="../not.html" target="blank">Checkout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="../rik/login.html?">My Account</a></li>
                            <li><a href="../rik/contact.html">Contact</a></li>
                            
                            <li><a href="../all/product.html">Shop</a></li>
							<li><a href="../NOT.HTML" target="blank">Shopping Cart</a></li>
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
	<script>
			function validate(){
				var username = document.getElementById("username");
				var password = document.getElementById("password");
				if(username.value=="rmaharjan" && password.value=="rishav")
				{
					
					return true;
			
				}
				alert ("Invalid username or password");
				return false;
			}
	</script>
</html>	