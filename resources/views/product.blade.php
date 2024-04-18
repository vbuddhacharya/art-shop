<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/prod.css')}}">
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
    <title>Art Details</title>
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
                <h4 class="path-name">Art Store / Product / {{$prod->name}}</h4>
            </div>
            <div class="profile-container">
                @if (Auth::check())
                <a href="{{route('edit')}}"><i class="fa-solid fa-user"></i> {{ Auth::user()->name}}</a>
                <a href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            @else
                <a href="{{route('login')}}"><i class="fa-solid fa-user" style="color: #8A191D;"></i> Login</a>
                <a href="{{route('signup')}}"><i class="fa-solid fa-user-plus" style="color: #8A191D;"></i> Register</a>
            @endif
    </div>
        </div>
        <div class="main-section">
          <div class="detail-section">
              <div class="product-img">
                  <img src="{{ url('/images/arts/'.$prod->image) }}" alt="Product Image">
                  
              </div>
              <div class="details">
                  <div class="title">{{$prod->name}}
                      <div class="artist">{{$prod->user->name}}</div>
                  </div>
                  
                  <div class="info">
                      <div class="desc">
                          <div class="de">About the artwork</div>
                          {{$prod->description}}
                      </div>
                      <div class="cat">
                          <div class="de">Details</div>
                          Category: {{$prod->category}}
                          <div class="size">
                              Size: {{$prod->size}} <br>
                              Material: {{$prod->material}}
                          </div>
                          
                      </div>
                      
                      
                      <div class="delivery">
                          <div class="de">Delivery Information</div>
                          Frame Included:@if($prod->hasFrame==1) Yes @else No @endif
                          {{-- <div>
                              Delivery Time: {{$prod->time}}
                          </div> --}}
                          <div class="stock">Available:
                            @if($prod->stock>0) Yes @else No @endif
                          </div>
                          <div>Artist Contact: {{$prod->user->contact}}</div>
                      </div>
                      
                  </div>
                  <div class="other">
                      <div class="price">Rs. {{$prod->price}}</div>
                      
                  </div>
                  <form action="{{route('add',$prod->id)}}" method="post" style="width:100%">
                    @csrf
                      <div class="order"> 
                          <div class="qn">
                              <label for="quantity">Quantity 
                                  <select name="quantity" id="quantity">
                                    @if($prod->stock<1) <option value="0" selected>Out of Stock</option> 
                                    @else
                                      @for($i=1; $i<=$prod->stock; $i++)
                                          <option value="{{ $i }}" @if($i == 1) selected @endif>{{ $i }}</option>
                                      @endfor
                                    @endif
                                  </select>
                              </label>
                          </div>
                          <div class="buttons">
                              <input type="hidden" name="artid" value="{{$prod->id}}">
                              <button type="submit" name="button" value="buy" @if ($prod->stock<1)
                                  disabled
                              @endif>Buy</button>
                              <button type="submit" name="button" value="cart">Add to Cart</button>
                          </div>                        
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
    
  
  
</body>
</html>