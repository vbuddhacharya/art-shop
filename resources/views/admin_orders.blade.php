<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    <link rel="stylesheet" href="{{asset('css/adminord.css')}}">
    
    <link rel="stylesheet" href="css/purchasehistory.css">
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?
     family=Material+Icons">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">   
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> 
     <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
     <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

</head>
<body>
  <div class="side-menubar">
    <div class="sm-logo">Art Store</div>
    <div class="side-menu">
        <a href="{{route('admin')}}"><i class="fa-solid fa-house"></i>Dashboard</a>
        <a href="{{route('allorders')}}"><i class="fa-solid fa-cart-shopping"></i>Orders</a>
        <a href="{{route('allusers')}}"><i class="fa-solid fa-users"></i>Customers</a>
        <a href="{{route('allartists')}}"><i class="fa-solid fa-palette"></i>Artists</a>
        <a href="{{route('stats')}}"><i class="fa-solid fa-chart-simple"></i>Statistics</a>
        <a href="{{route('admin')}}"><i class="fa-solid fa-star"></i>Requests</a>
        <a href="{{route('admin')}}"><i class="fa-solid fa-user"></i>Profile</a>
    </div>
</div>
    <main>
      <div class="content">
        <div class="content-1">
          <div class="category-title path-title">Admin \ Orders</div>
            <div class="category-title">All Orders</div>
            <div class="data-table">
              <table id="example" class="table table-striped" style="width:100%;">
                <thead>
                  <tr>
                      <th>#</th>
                      {{-- <th>Product</th> --}}
                      <th>Name</th>
                      <th>Qty</th>
                      <th>Customer</th>
                      <th>Contact</th>
                      <th>Location</th>
                      <th>Date</th>
                      <th>Total</th>
                      <th>Artist</th>
                      <th>Completion</th>
                      <th>Status</th>
                      <th>Update</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <th>{{$order->id}}</th>
                        {{-- <td>
                            <div class="product">
                                <img src="{{ url('/images/arts/'.$order->art->image) }}" alt="" style="width: 100%">    
                            </div></td> --}}
                        <td class="name">{{$order->art->name}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->contact}}</td>
                        <td>{{$order->location}}</td>
                        @php
                            $dt = $order->created_at;
                            $dt->modify('+7 day');
    
                        @endphp
                        <td>{{$dt->format('Y-m-d')}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->art->user->name}}</td>
                        <td>{{$order->artist_status}}</td>
                        <td>{{$order->status}}</td>
                        <td>
                            {{-- <p>{{$order->status}}</p> --}}
                            @if ($order->status == 'Pending' && $order->artist_status == 'Ready')
                            <form action="{{route('updateorder')}}" method="post">
                                @csrf
                                <input type="hidden" name="updatetype" value="admin">
                                <input type="hidden" name="orderid" value="{{$order->id}}">
                                <button type="submit" class="complete">
                                Complete
                                </button>
                            </form>
                            
                            @endif
                            
                        
                            
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
              </table>
          </div>
            

        </div>
    </div>
    </main>
    
    <script>
      $(document).ready(function(){
          $('#example').DataTable();
      });
  </script>   
</body>
</html>