<!DOCTYPE html>
<html>
<head>
  <title>Arts|Order</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/orderform.css') }}">
  <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                <h4 class="path-name">Art Store / Home</h4>
            </div>
            <div class="profile-container">
                <a href="{{route('login')}}"><i class="fa-solid fa-user" style="color: #8A191D;"></i> Login</a>
                <a href="{{route('signup')}}"><i class="fa-solid fa-user-plus" style="color: #8A191D;"></i> Register</a>
            </div>
        </div>
        <div class="container" id="con">
          <h2 style="text-align: center">Order Details</h2>
          <form action="{{route('order')}}" method="post">
            @csrf
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Delivery Location:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="location">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email1">Contact:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email1" name="contact" value="{{Auth::user()->contact}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">Total:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" id="pwd" name="sum" value="{{$sum}}" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd1">Delivery Charge:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" id="pwd1" name="delivery" value="{{$delivery}}" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd1">Grand Total:</label>
              <div class="col-sm-10">          
                <input type="text" class="form-control" id="pwd1" name="total" value="{{$total}}" readonly>
              </div>
              <input type="radio" name="payment_method" value="khalti">Khalti <br>
              <input type="radio" name="payment_method" value="cod" checked>COD
            </div>
            <div class="buttons">
              @if(isset($values['quantity']))<input type="hidden" name="quantity" value="{{$values['quantity']}}">@endif
              @if(isset($values['artid']))<input type="hidden" name="artid" value="{{$values['artid']}}">@endif
              <input type="submit" value="Confirm" class="confirm">
              <input type="reset" value="Cancel" class="cancel">
          </div>

          </form>
        </div>
        
    </div>
</div>
  
    
</body>
</html>
