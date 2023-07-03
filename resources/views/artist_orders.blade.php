<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet"/>
    <title>Artist Orders</title>
    <link rel="stylesheet" href="{{asset('css/artistord.css')}}">
</head>
<body>
    {{-- <div class="banner">
        <img src="{{asset('images/art/5.jpg')}}" alt="Banner">
    </div> --}}
    <div class="pending">
        
        <div class="title">Art Orders</div>
        <div  class="table-responsive tbl">
            <table class="table align-middle table-hover" style="margin:auto; text-align:center">
                <thead>
                <tr class="color">
                    <th scope="col">Order#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Location</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <div class="product">
                            <img src="{{asset('images/art/1.jpg')}}" alt="" style="width: 100%">    
                        </div></td>
                    <td class="name">Beauty in Tradition</td>
                    <td>1</td>
                    <td>Nikita Maharjan</td>
                    <td>9865534109</td>
                    <td>NCCS College, Paknajol</td>
                    <td>10/7/2023</td>
                    <td>1100</td>
                    <td>
                    <button type="button" class="bun btn btn-link btn-sm px-3" data-ripple-color="dark"
                    >
                        Complete
                    </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">12</th>
                    <td>
                        <div class="product">
                            <img src="{{asset('images/art/3.jpg')}}" alt="" style="width: 100%">    
                        </div></td>
                    <td class="name">Sukuna</td>
                    <td>1</td>
                    <td>Ramesh Shakya</td>
                    <td>9865109884</td>
                    <td>Bhagwan Pau, Swoyambhu</td>
                    <td>2/7/2023</td>
                    <td>3000</td>
                    <td>
                        Completed
                    {{-- <button type="button" class="btn btn-link btn-sm px-3" data-ripple-color="dark"
                    style="background-color: aqua; color:brown">
                        Complete
                    </button> --}}
                    </td>
                </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>