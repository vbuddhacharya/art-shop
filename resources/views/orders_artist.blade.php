<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kalaa|ArtFeature</title>
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?
    family=Material+Icons">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/users.css')}}">

</head>
<body>

    <div class="side-menubar">
        <div class="sm-logo">Kalaa</div>
        <div class="side-menu">
            <a href="{{route('artist.home')}}"><i class="fa-solid fa-house"></i>Dashboard</a>
            <a href="{{route('allorders')}}"><i class="fa-solid fa-cart-shopping"></i>Orders</a>
            <a href="{{route('allartists')}}"><i class="fa-solid fa-palette"></i>My Arts</a>
            <a href="{{route('artist.feature')}}"><i class="fa-solid fa-font-awesome"></i>Feature</a>
            <a href="{{route('upload')}}"><i class="fa-solid fa-upload"></i>Upload</a>
            <a href="{{route('artist.home')}}"><i class="fa-solid fa-user"></i>Profile</a>
        </div>
    </div>
    <main>
      <div class="path-title">Admin \ Customers</div>
      <div class="main-sec">
        <section id="customers">
          {{-- <p>Total Customers: </p> --}}
          <div class="container mt-3">
              <div class="row">
                <div class="col-md-8 tb">
                  <div class="titles">
                    <h2 class="user-title">All Customers</h2>
                    <p class="total-cust"><b>Total Customers</b> </p>
                  </div>
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <br>
                  <table class="table align-middle table-hover user-table">
                    <thead>
                      <tr class="color">
                          <th scope="col">Name</th>
                          <th scope="col">Contact</th>
                          <th scope="col">Email</th>
                          <th scope="col">Orders</th>
                      </tr>
                    </thead>
                    <tbody id="tableData">
                      
                      <tr onclick="showInfo()">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                {{-- <div class="col-md-4"> Sidebar </div> --}}
              </div>
            </div>
      </section>
      <section id="profile">
        <div class="details">
          <h2 class="profile-title">Customer Profile</h2>
          <div class="pic">
            <img src="{{asset('images/profile.png')}}" alt="Profile Picture">
          </div>
          <div class="user-info">
            <span class="profile-data"><span>Name </span><span id="name"></span></span>
            <span class="profile-data"><span>Contact </span><span id="contact"></span></span>
            <span class="profile-data"><span>Email </span><span id="email"></span></span>
            <span class="profile-data"><span>Joined Date </span><span id="joined"></span></span>
            <span class="profile-data"><span>Orders </span><span id="orders"></span></span>
          </div>
        </div>
        <div class="buttons">
          <form action="/" method="get">
            @csrf
            <input type="hidden" name="id" value="" id="custdetail">
            <button type="submit">View Orders</button>
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
        
          var profile = document.getElementById('profile');
          profile.style.display = 'block';
          users.forEach(function(user){
            if(user['id']==id){
              // console.log(user['id']);
              document.getElementById('name').innerHTML = user['name'];
              document.getElementById('contact').innerHTML = user['contact'];
              document.getElementById('email').innerHTML = user['email'];
              document.getElementById('joined').innerHTML = user['joined'];
              document.getElementById('orders').innerHTML = user['order_count'];
              document.getElementById('custdetail').value = user['id'];
            }
          });          
        }
      </script>
</body>
</html>