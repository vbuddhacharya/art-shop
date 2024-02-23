<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap --}}
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('css/editprofile.css')}}">
    <title>Document</title>
</head>
<body @if (Session::has('message')) onLoad="showMessage()"
    
@endif>
    <div class="whole-container">
        <div class="side-menubar">
            <div class="sm-logo">Art Store</div>
            <div class="side-menu">
                <a href="{{route('home')}}"><i class="fa-solid fa-house"></i>Home</a>
                <a href="{{route('explore')}}"><i class="fa-regular fa-compass"></i>Explore</a>
                <a href="{{route('saved')}}"><i class="fa-regular fa-heart"></i>Saved</a>
                <a href="{{route('cart')}}"><i class="fa-solid fa-cart-shopping"></i>Cart</a>
                <a href="{{route('edit')}}"><i class="fa-regular fa-user"></i>Profile</a>
                <a href="{{route('orders')}}"><i class="fa-solid fa-clock-rotate-left"></i>Orders</a>
                <a href="contact.html"><i class="fa-regular fa-message"></i>Contact us</a>
                <a href="setting.html"><i class="fa-solid fa-gear"></i>Setting</a>
            </div>
        </div>
        <div class="main-container">
            <div class="navbar-container">
                <div class="path">
                    <h4 class="path-name">Kalaa / Edit Profile</h4>
                </div>
                <div class="profile-container">
                    <a href="{{route('login')}}"><i class="fa-solid fa-user" style="color: #8A191D;"></i> Login</a>
                    <a href="{{route('signup')}}"><i class="fa-solid fa-user-plus" style="color: #8A191D;"></i> Register</a>
                </div>
            </div>
            <div class="container">
                <div class="category-title">Edit Profile</div>
                <form action="{{route('updateprofile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="updateform">
                        <div class="form-group profile-pic left">
                            @if (isset($user->image))
                                <img src="{{ url('/images/arts/'.$user->image) }}" class="pic" alt="Profile Picture">
                            @else
                                <img src="{{asset('images/profile.png')}}" class="pic" alt="Profile Picture">
                            @endif
                            <small id="emailHelp" class="form-text text-muted pb-1">Profile Picture</small>
                            <input type="file" class="form-control-file" id="myFile" name="image" onchange="showFileName(this)">
                        </div>
                        <div class="right">
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label pr-0">Full Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext" name="name" id="name" aria-describedby="emailHelp" value="{{$user->name}}" readonly>
                                </div>
                                </div>
                            <div class="form-group row">
                                <label for="user" class="col-sm-4 col-form-label pr-0">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="username" id="user" value="{{$user->username}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputEmail1" class="col-sm-4 col-form-label pr-0">Email address</label>
                              <div class="col-sm-8">
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$user->email}}" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="old" class="col-sm-4 col-form-label pr-0">Old Password</label>
                              <div class="col-sm-8">                    
                                <input type="password" class="form-control" name="oldpassword" id="old" placeholder="Old Password">
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="new" class="col-sm-4 col-form-label pr-0">New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="newpassword" id="new" placeholder="New Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contact" class="col-sm-4 col-form-label pr-0">Contact</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="contact" id="contact" value="{{$user->contact}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="buttons">
                        <button type="submit" class="btn btn-secondary">Update</button>
                        <button type="reset" class="btn btn-light">Reset</button>    
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    
    
    <script>
        function showFileName(input) {
            var fileName = input.files[0].name;
            document.getElementById("file-name").textContent = fileName;
        }
        function match(){
            $new = document.querySelector("#new");
            $again = document.querySelector("#again");
            if($new != $again){
                $msg = document.querySelector("#message");
                $msg.textContent = "Passwords do not match!";
            }
        }
        function checkValid(){

        }
        function showMessage(){
            alert("Incorrect Old Password!")
        }

    
    </script>
</body>
</html>