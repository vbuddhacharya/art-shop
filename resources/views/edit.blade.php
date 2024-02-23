<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body @if (Session::has('message')) onLoad="showMessage()"
    
@endif>
    {{-- <form action="{{route('edit.picture')}}">
        <div class="picture">
            <img src="" alt="profile">
        </div>
        
    </form> --}}
    <form action="{{route('updateprofile')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($user->image))
            <img src="{{ url('/images/arts/'.$user->image) }}" alt="Profile Picture">
        @else
            <img src="{{asset('images/profile.png')}}" alt="Profile Picture">
        @endif
        <input type="file" id="myFile" name="image" onchange="showFileName(this)">
        <label for="myFile">Choose Image</label>
        <span id="file-name"></span>
        Name: <input type="text" name="name" id="name" value="{{$user->name}}" readonly>
        Username: <input type="text" name="username" id="user" value="{{$user->username}}" required>
        Old password: <input type="password" name="oldpassword" id="old" >
        New password: <input type="password" name="newpassword" id="new">
        Confirm password: <input type="password" name="confirm" id="again"  oninput="match()">
        Contact: <input type="text" name="contact" value="{{$user->contact}}" required>
        Email: <input type="text" name="email" value="{{$user->email}}" required>
        <button type="submit">Update</button>
        <button type="reset">Reset</button>
    </form>
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