<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?
    family=Material+Icons">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
    {{-- <nav>
        <ul>
            <li>Dashboard</li>
            <li>Customers</li>
            <li>Artists</li>
            <li>Orders</li>
            <li>Statistics</li>
            <li>Features</li>
            <li>Edit Profile</li>
        </ul>
    </nav> --}}
    <div class="side-menubar">
        <div class="sm-logo">Art Store</div>
        <div class="side-menu">
            <a href="{{route('admin')}}"><i class="fa-solid fa-house"></i>Dashboard</a>
            <a href="{{route('allorders')}}"><i class="fa-solid fa-cart-shopping"></i>Orders</a>
            <a href="{{route('allusers')}}"><i class="fa-solid fa-users"></i>Customers</a>
            <a href="{{route('allartists')}}"><i class="fa-solid fa-palette"></i>Artists</a>
            <a href="{{route('stats')}}"><i class="fa-solid fa-chart-simple"></i>Statistics</a>
            <a href="{{route('admin.features')}}"><i class="fa-solid fa-star"></i>Requests</a>
            <a href="{{route('login')}}"><i class="fa-solid fa-user"></i>Profile</a>
        </div>
    </div>
    <main class="main-section">
        <div class="path-title">Admin \ Dashboard</div>
        <section id="welcome">
            <span class="welcome-text">Welcome Admin!</span>
        </section>
        <section id="at-glance">
            <span class="glance-text">OVERVIEW</span>
            <div class="info">
                <div class="pending">
                    <span class="glance-title">Pending orders</span>
                    <div class="data">
                        <span class="data-value">{{$ordercount}}</span>
                    </div>
                    <div class="lines">
                        <hr class="line1">
                        <hr class="line2">
                    </div>
                </div>
                <div class="sales">
                    <span class="glance-title">Sales Today</span>
                    <div class="data">
                        <span class="data-value">{{number_format($total)}}</span>
                    </div>
                    <hr class="line1">
                    <hr class="line2">
                </div>
                <div class="features">
                    <span class="glance-title">Requests</span>
                    <div class="data">
                        <span class="data-value">3</span>
                    </div>
                    <hr class="line1">
                    <hr class="line2">
                </div>
                <div class="users">
                    <span class="glance-title">Total Users</span>
                    <div class="data">
                        <span class="data-value">{{$usercount}}</span>
                    </div>
                    <hr class="line1">
                    <hr class="line2">
                </div>
            </div>
        </section>
        <section id="products">
            <div class="orders container">
                <div class="sec-title">Latest Orders</div>
                <div class="orders-data table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Customer</th>
                                <th>Location</th>
                                <th>Contact</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->art->name}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->location}}</td>
                                <td>{{$order->contact}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->status}}</td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="top">
                <div class="sec-title">
                    Most Ordered
                </div>
                <div class="top-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pic">Item</th>
                                <th>Item Name</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tops as $top)
                            <tr>
                                <td class="pic"><img src="{{ url('/images/arts/'.$top->image) }}" alt="Product Image"></td>
                                <td>{{$top->name}}</td>
                                <td>{{$top->order_count}}</td>
                                
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
</html>