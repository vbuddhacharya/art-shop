<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> 

    <link rel="stylesheet" href="{{asset('css/features.css')}}">
    <title>Feature Requests</title>
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
            <a href="{{route('admin.features')}}"><i class="fa-solid fa-star"></i>Requests</a>
            <a href="{{route('edit')}}"><i class="fa-solid fa-user"></i>Profile</a>
        </div>
    </div>
    <main class="main-section">
        <div class="path-title">Admin \ Dashboard</div>
        <section id="welcome">
            <span class="welcome-text">Feature Requests</span>
        </section>
        <div class="tables">
            <div class="pending table-responsive">
                <div class="titles"><span class="category-title">Pending Requests</span><span class="numbers">Total {{$pending->count()}}</span></div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Art</th>
                        <th scope="col">Artist</th>
                        <th scope="col">Days</th>
                        <th scope="col">Date</th>
                        <th scope="col">Feature</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($pending as $p)
                            <tr>
                                <th scope="row">{{$p->art->name}}</th>
                                <td>{{$p->art->user->name}}</td>
                                <td>{{$p->time}}</td>
                                <td>{{$p->date}}</td>
                                <td>
                                    <form action="{{route('features.add')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="featureid" value="{{$p->id}}">
                                        <button type="submit" class="btn btn-outline-secondary btn-sm">Feature</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
            <div class="running table-responsive">
                <div class="titles"><span class="category-title">Running Features</span><span class="numbers">Total {{$running->count()}}</span></div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Art</th>
                        <th scope="col">Artist</th>
                        <th scope="col">Days</th>
                        <th scope="col">Expiry Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($running as $r)
                            <tr>
                                <th scope="row">{{$r->art->name}}</th>
                                <td>{{$r->art->user->name}}</td>
                                <td>{{$r->time}}</td>
                                <td>{{$r->expiry->format('d-M-Y')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="data-table completed table-responsive">
                <div class="titles"><span class="category-title">Completed Features</span><span class="numbers">Total {{$completed->count()}}</span></div>
                <table id="example" class="table table-striped" style="width:100%;">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Start Date</th>
                        <th>Expiry Date</th>
                        <th>Art</th>
                        <th>Artist</th>
                        <th>Days</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($completed as $c)
                        <tr>
                            <th>{{$c->created_at->format('d-M-Y')}}</th>
                            <td>{{$c->start_date->format('d-M-Y')}}</td>
                            <td>{{$c->expiry->format('d-M-Y')}}</td>
                            <td>{{$c->art->name}}</td>
                            <td>{{$c->art->user->name}}</td>
                            <td>{{$c->time}}</td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </main>
</body>
<script>
    $(document).ready(function(){
        $('#example').DataTable();
    });
</script> 
</html>