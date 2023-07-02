<!doctype html>
<html>
	<head>
		<title>Sign up|Sandukh</title>
		 <link rel="icon" href="favicon.ico" type="image/ico" sizes="16x16"> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SANDUK</tITLE>
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
				background-image: url(loginsignup.jpg);
				background-size: cover;
			}
			.box{
				margin:10px;
				position: relative;
				/*top: 70%;*/
				left:34%;
				/*transform: translate(-50%,-50%);*/
				width: 400px;
				padding: 40px;
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
				padding: 5px 0;
				font-size: 16px;
				color: #fff;
				letter-spacing: 1px;
				margin-bottom: 30px;
				border: none;
				border-bottom: 1px solid #fff;
				outline: none;
				background: transparent;
			} 
			.box .inputbox label{
				position: absolute;
				top: 0;
				left: 0;
				letter-spacing: 1px;
				padding: 10px 0;
				font-size: 16px;
				color: #fff;
				pointer-events: none;
				transition: .5s;
			}	
			.box .inputbox input:focus~label,
			.box .inputbox input:valid~label{
				top: -18px;
				left: 0;
				color: #03a9f4;
				font-size: 12px;
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
	<div class="res">
		<div class="box">
			<h2>Sign up</h2>
			<form id="myform" action="login.html" onsubmit="return validate()">
		<div class="inputbox">
			<input type="text" name="firstname" placeholder="First name" id="fname" required>
					</div>
					<div class="inputbox">
			<input type="text" name="lastname" placeholder="Last name" id="lname" required>
					</div>
		<div class="inputbox">
			<input type="email" name="email" placeholder="Email" id="email" required>
					</div>
					<div class="inputbox">
						<input type="text" name="username" placeholder="Username" id="username" required>
					</div>
					<div class="inputbox">
						<input type="password" name="password" placeholder="Password" id="password" required>
					</div>
					<input type="submit" name="" value="Submit">
				</form>	
		</div>
</div>

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
			var firstname = document.getElementById("fname");
			var lastname = document.getElementById("lname");
			var email = document.getElementById("email");
			var username = document.getElementById("username");
			var password = document.getElementById("password");

		 	if(password.value.length<=8){
				console.log("password should be more than eight characters");
				return false;
			}
			
console.log("firstname =" , firstname.value);
 console.log("lastname =" , lastname.value);
console.log("email =" , email.value);
console.log("username =" , username.value);
			alert("your signup is successful");


			return true;
			
		}
	</script>
</html>	