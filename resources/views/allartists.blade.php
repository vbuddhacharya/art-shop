<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artists</title>
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/users.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
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
        <section>
            <div class="path-title">Admin \ Artists</div>
            <div class="container mt-3">
                <div class="row">
                  <div class="col-md-8 tb">
                    <h2>Artists</h2>
                    <p>Total Artists: {{$artistcount}}</p>
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <table class="table align-middle table-hover user-table">
                      <thead>
                        <tr class="color">
                            <th scope="col">Name</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Email</th>
                            <th scope="col">Items</th>
                            <th scope="col">Orders</th>
                        </tr>
                      </thead>
                      <tbody id="tableData">
                        @foreach ($artists as $artist)
                        <tr>
                            <td>{{$artist->name}}</td>
                            <td>{{$artist->contact}}</td>
                            <td>{{$artist->email}}</td>
                            <td>{{$artist->art_count}}</td>
                            <td>{{$artist->order}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  {{-- <div class="col-md-4"> Sidebar </div> --}}
                </div>
              </div>
            {{-- <div>
                <h1>Artists</h1>
                <p>{{$artistcount}}</p>
                <table class="table align-middle table-hover" style="margin:auto; text-align:center">
                    <thead>
                    <tr class="color">
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Email</th>
                        <th scope="col">Items</th>
                        <th scope="col">Orders</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($artists as $artist)
                        <tr>
                            <td>{{$artist->name}}</td>
                            <td>{{$artist->contact}}</td>
                            <td>{{$artist->email}}</td>
                            <td>{{$artist->art_count}}</td>
                            <td>{{$artist->order}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
        </section>
    </main>
</body>
</html>