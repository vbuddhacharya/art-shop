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
        <div class="path-title">Admin \ Artists</div>
      <div class="main-sec">
        <section id="customers">
          {{-- <p>Total Customers: {{$custcount}}</p> --}}
          <div class="container mt-3">
              <div class="row">
                <div class="col-md-8 tb">
                  <div class="titles">
                    <h2 class="user-title">All Artists</h2>
                    <p class="total-cust"><b>Total Artists</b> {{$artistcount}}</p>
                  </div>
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
                      <tr onclick="showInfo({{$artist->id}})">
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
              </div>
            </div>
      </section>
        {{-- <section id="customers">
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
                        <tr onclick="showInfo({{$artist->id}})>
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
                </div>
              </div>
        </section> --}}
        <section id="profile">
            <div class="details">
              <h2 class="profile-title">Artist Profile</h2>
              <div class="pic">
                <img src="{{asset('images/profile.png')}}" alt="Profile Picture">
              </div>
              <div class="user-info">
                <span class="profile-data"><span>Name </span><span id="name"></span></span>
                <span class="profile-data"><span>Contact </span><span id="contact"></span></span>
                <span class="profile-data"><span>Email </span><span id="email"></span></span>
                <span class="profile-data"><span>Joined Date </span><span id="joined"></span></span>
                <span class="profile-data"><span>Items </span><span id="arts"></span></span>
                <span class="profile-data"><span>Orders </span><span id="orders"></span></span>
              </div>
            </div>
            <div class="buttons artist-det">
              <form action="{{route('custorder')}}" method="post">
                @csrf
                <input type="hidden" name="custid" value="" id="custdetail">
                <button type="submit" name="button" value="artorder">View Orders</button>
                <button type="submit" name="button" value="item">View Items</button>
              </form>
            </div>
          </section>
      </div>
    </main>
    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tableData tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
      <script>
        function showInfo(id){
          var id = id;
          var users = {!! $artists->toJson() !!};
          var profile = document.getElementById('profile');
          profile.style.display = 'block';
          users.forEach(function(user){
            if(user['id']==id){
              // console.log(user['id']);
              document.getElementById('name').innerHTML = user['name'];
              document.getElementById('contact').innerHTML = user['contact'];
              document.getElementById('email').innerHTML = user['email'];
              document.getElementById('joined').innerHTML = user['joined'];
              document.getElementById('orders').innerHTML = user['order'];
              document.getElementById('arts').innerHTML = user['art_count'];
              document.getElementById('custdetail').value = user['id'];
            }
          });          
        }
      </script>
</body>
</html>