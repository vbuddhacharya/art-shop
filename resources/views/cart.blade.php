<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <title>Your Cart</title>
</head>
<body>
    <nav></nav>
    <main>
        <div class="main">
            <div class="cart">
                <div class="title">
                    Cart Items
                </div>
                <hr style="background-color: rgb(228, 197, 197);width:100%">
                <div class="order">
                    <div class="pic">
                        <img src="{{asset('images/art/3.jpg')}}" alt="Product Image">
                    </div>
                    <div class="prod-detail">
                        <div class="det">
                            <div class="prod-title">Sukuna</div>
                            <div class="artist">ArtistCha</div>
                            <div>Glass Painting</div>
                            <div class="quan">Quantity: 1</div>
                            <div>Delivery within 7 days</div>
                        </div>
                        
                        <div class="side">
                            <div class="price">Rs. 3000</div>   
                            <button>Remove</button> 
                        </div>
                        
                    </div>
                </div>
                <div class="order">
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
                </div>
            </div>
            <div class="total">
                <div class="title">
                    Cart Total
                    
                </div>
                <hr style="background-color: rgb(228, 197, 197);width:100%; margin-top:0px">
                <div class="info">
                    <div class="tot tots"><span>Total</span><span>Rs. 5000</span></div>
                    <div class="shipping tots"><span>Delivery Charge</span> <span>2x100</span></div>
                    <div class="tota tots"><span>Grand Total</span><span>Rs. 5200</span></div>
                </div>
                
                <div class="buttons">
                    <button>Checkout</button>
                    <button>Empty Cart</button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>