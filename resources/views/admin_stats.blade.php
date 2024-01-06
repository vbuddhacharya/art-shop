<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/stats.css')}}">
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="whole">
        <div class="side-menubar">
            <div class="sm-logo">Art Store</div>
            <div class="side-menu">
                <a href="{{route('admin')}}" style="text-decoration: none"><i class="fa-solid fa-house"></i>Dashboard</a>
                <a href="{{route('allorders')}}" style="text-decoration: none"><i class="fa-solid fa-cart-shopping"></i>Orders</a>
                <a href="{{route('allusers')}}" style="text-decoration: none"><i class="fa-solid fa-users"></i>Customers</a>
                <a href="{{route('allartists')}}" style="text-decoration: none"><i class="fa-solid fa-palette"></i>Artists</a>
                <a href="{{route('stats')}}" style="text-decoration: none"><i class="fa-solid fa-chart-simple"></i>Statistics</a>
                <a href="{{route('admin')}}" style="text-decoration: none"><i class="fa-solid fa-star"></i>Requests</a>
                <a href="{{route('admin')}}" style="text-decoration: none"><i class="fa-solid fa-user"></i>Profile</a>
            </div>
        </div>
        <main>
            <div class="path-title">Admin \ Statistics</div>
            <div class="main-sec">
                <div class="orders">
                    <div class="titles">
                        <h2 class="section-title">This Year's Data</h2>
                        @php
                            $sum = $pending + $completed;
                        @endphp
                        <h3 class="total">Total Orders: {{$sum}}</h3>
                    </div>
                    <div class="orders-current">
                        <div class="bar" style="width:500px;">
                            <canvas id="canvas1"></canvas>
    
                        </div>
                        <div class="pie">
                            <canvas id="canvas2" style="max-width: 500px;"></canvas>
                        </div>
                        {{-- <div class="total">
                            @php
                                $sum = $pending + $completed;
                            @endphp
                            <p>Total Orders: {{$sum}}</p>
                            <p>Pending: {{$pending}}</p>
                            <p>Completed: {{$completed}}</p>
                        </div> --}}
                    </div>
                    
                </div>
                <div class="others">
                    <div class="yearly">
                        <div>
                            <span class="glance-title">Yearly Data</span>
                        </div>
                        <div class="yearly-info">
                            <div class="container tb" style="width:100%">          
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>Year</th>
                                      <th>Completed Orders</th>
                                      <th>Total Sales</th>
                                      <th>New Users</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($order_data as $yr=>$data)
                                    <tr>
                                        <td>{{$yr}}</td>
                                        <td>{{$data[0]}}</td>
                                        <td>{{$data[1]}}</td>
                                        <td>{{$data[2]}}</td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                        </div>
                    </div>
                    <div class="monthly">
                        <span class="glance-title">Sales for Last 6 Months</span>
                        <div class="line">
                            <canvas id="canvas3" style="max-height:400px; max-width: 500px; padding: 5px"></canvas>
    
                        </div>
                    </div>
                    <div class="totals">
                        <span class="glance-title">Total Sales</span>
                        <div class="data">
                            <span class="data-value">{{number_format($total)}}</span>
                        </div>
                        <hr class="line1">
                        <hr class="line2">
                    </div>
                </div>
            </div>
            
            
        </main>
    </div>
    
    
    
    {{-- <script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        var monthsCount = <?php echo $monthsCount; ?>;
        var salesCount = <?php echo $salesCount; ?>;
        var usersCount = <?php echo $usersCount; ?>;
        new Chart("canvas1",{
            data: {
                datasets: [{
                    type: 'bar',
                    label: 'Orders',
                    data: monthsCount
                },{
                    type: 'line',
                    label: 'New Users',
                    data: usersCount,
                }],
                labels: months
            },
            options:{
                responsive: true,
            }
        });
    </script>
    <script>
        var orderTypes = ['Pending', 'Completed'];
        var orders = <?php echo $orderCount; ?>;
        new Chart("canvas2",{
            type: "pie",
            data:{
                labels: orderTypes,
                datasets:[{
                    
                    data: orders
                }]
            },
            options:{
                responsive: true,
                plugins:{
                    legend:{
                        position: 'top',
                    },
                    title:{
                        display: true,
                        text: "Orders"
                    }
                }
                
            }
        }) ;
    </script>
    <script>
        var months1 = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        let currentMonth=new Date().getMonth();
        var sales = <?php echo $salesCount; ?>;
        var cm = currentMonth+1;
        new Chart("canvas3",{
            type: "bar",
            data:{
                labels: months1.slice(cm-6).concat(months1.slice(0,cm)),
                datasets:[{
                    data: sales,
                    label: 'Sales',
                    backgroundColor: "pink"
                }]
            },
            options:{
                responsive: true,
                plugins:{
                    legend:{
                        position: 'top',
                    },
                    title:{
                        display: false,
                        text: "Sales"
                    }
                }
                
            }
        }) ;
    </script>
</body>
</html>