<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?
     family=Material+Icons">   
    <title>Cart</title>
</head>
<body>
    <div class="whole-container">
        <div class="side-menubar">
            <div class="sm-logo">Art Store</div>
            <div class="side-menu">
                <a href="{{route('home')}}"><i class="fa-solid fa-house"></i>Home</a>
                <a href="{{route('explore')}}"><i class="fa-regular fa-compass"></i>Explore</a>
                <a href="{{route('saved')}}"><i class="fa-regular fa-heart"></i>Saved</a>
                <a href="{{route('cart')}}"><i class="fa-solid fa-cart-shopping"></i>Cart</a>
                <a href="profile.html"><i class="fa-regular fa-user"></i>Profile</a>
                <a href="{{route('orders')}}"><i class="fa-solid fa-clock-rotate-left"></i>Orders</a>
                <a href="contact.html"><i class="fa-regular fa-message"></i>Contact us</a>
                <a href="setting.html"><i class="fa-solid fa-gear"></i>Setting</a>
            </div>
        </div>
        <div class="main-container">
            <div class="navbar-container">
                <div class="path">
                    <h4 class="path-name">Art Store / Cart</h4>
                </div>
                <div class="profile-container">
                    <a href=""><i class="fa-solid fa-user" style="color: #8A191D;"></i> {{Auth::user()->name}}</a>
                    {{-- <a href=""><i class="fa-solid fa-user-plus" style="color: #8A191D;"></i> Register</a> --}}
                </div>
            </div>
            <div class="content">
                <div class="content-1">
                    <!-- <div class="cart-title">My Cart</div> -->
                    <div class="cart-section">
                        <div class="cart-items-list">
                            {{-- <div class="cart-edit">
                                <div class="cart-edit1">
                                    <input type="checkbox">
                                    <label>SELECT ALL (0 ITEMS(S))</label>
                                </div>
                                <div class="cart-edit2">
                                    <a><i class="fa-solid fa-trash" style="color: #757575;"></i> DELETE</a>
                                </div>
                            </div> --}}
                            <div class="cart-title">
                                Your Cart
                            </div>
                            <hr class="line">
                            @foreach ($carts as $cart)
                            <a href="{{route('product',$cart->art_id)}}" style="text-decoration: none; color:initial">
                                <div class="cart-item">
                                    <div class="cart-item-left">
                                        {{-- <div class="cart-cbox">
                                            <input type="checkbox">
                                        </div> --}}
                                        <div class="cart-img">
                                            <img src="{{ url('/images/arts/'.$cart->art->image) }}">
                                        </div>
                                        <div class="cart-info">
                                            <a class="cart-info1">{{$cart->art->name}}</a>
                                            <div class="artist">{{$cart->art->user->name}}</div>
                                            <a class="cart-info2">{{$cart->quantity}}</a>
                                        </div>
                                    </div>
                                    <div class="cart-item-right">
                                        <div class="cart-amt">Rs. {{$cart->art->price}}</div>
                                        <form action="{{route('remove')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="cartid" id="cartid" value="{{$cart->id}}">
                                            <button>Remove</button> 
                                        </form>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            
                        </div>
                        <div class="cart-summary">
                            <div class="order-summary">Order Summary</div>
                            <div class="checkout-summary">
                                <div class="checkout-summary-row">
                                    <div class="checkout-label">Subtotal</div>
                                    <div class="checkout-value">Rs {{$sum}}</div>
                                </div>
                                <div class="checkout-summary-row">
                                    <div class="checkout-label">Shipping Fee</div>
                                    <div class="checkout-value">Rs {{$count}} x 100</div>
                                </div>
                                {{-- <div class="checkout-summary-row">
                                    <div class="checkout-label">Discount</div>
                                    <div class="checkout-value">Rs 0</div>
                                </div> --}}
                                
                                <div class="checkout-summary-total">
                                    <div class="checkout-label-total">Total</div>
                                    <div class="checkout-value-total">Rs {{$total}}</div>
                                </div>
                            </div>
                            <div class="checkout-btn">
                                <form action="{{route('next')}}" method="post">
                                    @csrf
                                    {{-- <input type="hidden" name="cartid" value="{{$cart->id}}"> --}}
                                    <button name="but" value="checkout">PROCEED TO CHECKOUT</button>
                                    <button name="but" value="empty">EMPTY CART</button>
                                    </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>