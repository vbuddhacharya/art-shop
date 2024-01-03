<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/stats.css')}}">
    <script src="https://kit.fontawesome.com/110779528c.js" crossorigin="anonymous"></script>

    <title>Document</title>
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
        </div>
        
        
    </main>
    
    {{-- <script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        
        var monthsCount = <?php echo $monthsCount; ?>;
        var barChartData = {
            labels: months,
            datasets: [{
                label: 'Orders',
                backgroundColor: "pink",
                data: monthsCount
            }]
        };
        window.onload = function(){
            var ctx = document.getElementById("canvas1").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options:{
                    elements: {
                        rectangle:{
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    plugins:{
                        title:{
                            display: true,
                            text: 'Monthly Orders'
                        }
                    }
                    
                }
            });
        };
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
</body>
</html>