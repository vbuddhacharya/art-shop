<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kalaa|Art Upload</title>
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?
    family=Material+Icons">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/upload.css')}}">

</head>
<body>

    <div class="side-menubar">
        <div class="sm-logo">Kalaa</div>
        <div class="side-menu">
            <a href="{{route('artist.home')}}"><i class="fa-solid fa-house"></i>Dashboard</a>
            <a href="{{route('allorders')}}"><i class="fa-solid fa-cart-shopping"></i>Orders</a>
            <a href="{{route('allusers')}}"><i class="fa-solid fa-users"></i>Customers</a>
            <a href="{{route('allartists')}}"><i class="fa-solid fa-palette"></i>My Arts</a>
            <a href="{{route('artist.feature')}}"><i class="fa-solid fa-font-awesome"></i>Feature</a>
            <a href="{{route('upload')}}"><i class="fa-solid fa-upload"></i>Upload</a>
            <a href="{{route('artist.home')}}"><i class="fa-solid fa-user"></i>Profile</a>
        </div>
    </div>

    <main class="main-section" style="margin-top: 2rem;">
      <section id="at-glance">
        
        <!-- upload form -->
  <div class="container-box">
  <span class="glance-text category-title">Share Your Creative Works</span><br>
<br>
    <form action="{{route('check')}}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
            <label for="artTitle" class="artlabel opacity">Art Title</label>
            <input type="text" id="artTitle" name="artname" placeholder="Enter Art Title" required>
        </div>
        <div class="form-row-group">

        <div class="form-img">
  <label for="artImage" class="artimg opacity">Art Image</label>
  <span class="file-input">
    <input type="file" id="myFile" name="image" onchange="showFileName(this)" required>
    <label for="myFile">Choose Image</label>
    <span id="file-name"></span>

  </span>
</div>
<div class="form-group" style="margin-left: 12vh;">
                <label for="artSize" class="artlabel opacity">Art Size</label>
                <input type="text" id="artSize" name="artsize" placeholder="Enter Art Size" required>
            </div>
            </div>

        
        <div class="form-row-group">
        <div class="form-group">
                <label for="artMaterial" class="artlabel opacity">Art Material</label>
                <select id="artMaterial" name="material">
                    <option value="Paper">Paper</option>
                    <option value="Glass">Glass</option>
                    <option value="Canvas">Canvas</option>
                </select>
            </div>
            <div class="form-group" style="margin-left: 10vh;">
                <label for="artPrice" class="artlabel opacity">Art Price</label>
                <input type="number" id="artPrice" name="artprice" min="0" required>
            </div>

        </div>

        <div class="form-row-group">
        <div class="form-group">
                <label for="artStock" class="artlabel opacity">Art Stock</label>
                <input type="number" id="artStock" name="stock" min="1" max="100" step="1" value="1" required>
            </div>

            <div class="form-group" style="margin-left: 10vh;">
                <label for="artCategory" class="artlabel opacity">Art Category</label>
                <select id="artCategory" name="category" required>
                    <option value="Color Pencil">Color Pencil</option>
                    <option value="Pencil Sketch">Pencil Sketch</option>
                    <option value="Acrylic Paint">Acrylic Paint</option>
                    <option value="Watercolor">Watercolor</option>
                    <option value="Oil Paint">Others</option>

                </select>
            </div>
        </div>

     
            <div class="form-group">
            <label for="artDescription" class="artlabel opacity">Art Description</label>
            <textarea id="artDescription" name="description" placeholder="Provide Proper Art Description" required></textarea>
            </div>

        <br/>
        <div class="form-group">
            <div class="radio-group">
                <label for="frameIncluded" class="artlabel opacity">Include Frame?</label>
                <input type="radio" id="yes" name="frame" value="1"  style="opacity:0.7; margin-left:1rem;" required>
                <label for="yes" style="font-size:17px; opacity:0.7;">Yes</label>
                <input type="radio" id="no" name="frame" value="0" style=" opacity:0.7; margin-left:2rem;" checked required>
                <label for="no" style="font-size:17px; opacity:0.7;">No</label>
                
            </div>
        </div>

        <center><button type="submit">Upload</button></center>
    </form>
  </div>
      </section>
    </main>
    <script>
    function showFileName(input) {
  var fileName = input.files[0].name;
  document.getElementById("file-name").textContent = fileName;
}

</script>

</body>
</html>