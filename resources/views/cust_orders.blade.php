<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/order.css')}}">
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> 
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <title>Order History</title>
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
            <a href="purchase_history.html"><i class="fa-solid fa-clock-rotate-left"></i>Purchase History</a>
            <a href="contact.html"><i class="fa-regular fa-message"></i>Contact us</a>
            <a href="setting.html"><i class="fa-solid fa-gear"></i>Setting</a>
        </div>
    </div>
    <div class="main-container">
        <div class="navbar-container">
          <div class="path">
            <h4 class="path-name">Art Store / Order History</h4>
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
        <div class="content">
            <div class="content-1">
                <div class="category-title">Purchase History</div>
                <div class="data-table">
                    <table id="example" class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Amount</th>
                                <th>Purchase Date</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->art->name}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>Rs {{$order->total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->contact}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->payment}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                

            </div>
        </div>
    </div>
  </div>
    {{-- <main>
        <div class="main">
            <div class="title-sec">
                <span class="main-title">
                    Order History
                    <hr style="width:90%; background-color:rgba(0, 0, 0,0.2); margin-top:2px" >
                </span> 
            </div>
            <div class="orders">
                @foreach ($orders as $order)
                  <div class="order">
                    <div class="product">
                        <img src="{{ url('/images/arts/'.$order->art->image) }}" alt="Product Image">
                    </div>
                    <div class="details">
                        
                        <div class="side">
                            <div class="title">{{$order->art->name}}</div>
                            <div class="inf ord">{{$order->id}}</div>
                        </div>
                        <div class="info">
                            <div class="inf">Contact: {{$order->contact}}</div>
                            <div class="inf">Delivery Location: <span class="deet">{{$order->location}}</span></div>
                            <div class="inf">Delivery Date: <span class="deet">{{$order->created_at}}</span></div>
                            <div class="inf">Status: <span class="deet">{{$order->status}}</span></div>
                            <div class="inf total"><span class="deet">Rs.{{$order->total}}</span></div>
                            
                        </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </main> --}}
    
    <script>
      $(document).ready(function(){
          $('#example').DataTable();
      });
  </script>
  
</body>
</html>