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
    <link rel="stylesheet" href="{{asset('css/feature_artist.css')}}">

</head>
<body @if (Session::has('message')) onLoad="showMessage()"
    
@endif>
    
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

    <main class="main-section" style="margin-top: 2rem;">
      <section id="at-glance">
            <div class="container-box">
            <span class="glance-text category-title">Featuring Artwork Form</span>

                <form action="{{route('checkFeature')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="artistName" class="opacity">Artist Name:</label>
                        <input type="text" id="artistName" name="artist_name" value="{{ auth()->user()->name }}" readonly>
                    </div>
                    <div class="form-row-group">

                    <div class="form-group">
                    <label for="arts" class="opacity">Arts</label>
                <select id="arts" name="arts">
                <option value="" disabled selected>Select Art Title</option>
                @foreach($arts as $art)
                    @if($art->user_id === Auth::id())
                    <option value="{{ $art->id }}">{{$art->name}}</option>
                    @endif
                @endforeach

                </select>                    
            </div>

            <div class="form-group" style="margin-left:10vh;">
                        <label for="artprice" class="opacity">Featuring Time Period:</label>
                        <select id="featuring_period" name="featuring_period">
                            <option value="1">1 Day</option>
                            <option value="7">1 Week</option>
                            <option value="30">1 Month</option>
                        </select>                    
                    </div>
            </div>

                    <div class="form-group opacity">
                        <label for="payment_method">Select Payment Method:</label>
                            <br>
                            <input type="radio" name="payment_method" value="cod" id=""  checked> COD 
                            &nbsp; &nbsp; &nbsp;<input type="radio" name="payment_method" id="" value="khalti"> Khalti
                        
                    </div>

                    
                    
                    <center><button type="submit" id="confirm_submit" data-toggle="modal" data-target="#exampleModalCenter">Submit</button></center>
                
                </form>
            </div>
                        </div>
       <div id="products">
       <div class="orders container">
       <span class="sec-title">Featuring Price Schema</span><br>
                <div class="orders-data table-responsive">
                <div class="orders-data table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>1 Day</th>
                                <th>300</th>
                                
                            </tr>
                            <tr>
                                <th>1 Week / 7 Days</th>
                                <th>2100</th>
                                
                            </tr>
                            <tr>
                                <th>1 month / 30 Days</th>
                                <th>6300</th>
                                
                            </tr>
                        </thead>
                    
                    </table>
                </div>
            </div>

                        </div>
       </section>
    </main>

<script>
    function showMessage(){
        alert("Product already featured");
    }
</script>
{{-- <script>
    $("document").ready( function (){
            $("#confirm_submit").on("click", function (evt) {
                let confirmation = confirm("Are you sure?");
                if (!confirmation) {
                    evt.preventDefault()
                }
            })
        })

</script> --}}
</body>
</html>
