<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="bar" style="width:500px">
        <canvas id="canvas"></canvas>
    </div>
    
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
            var ctx = document.getElementById("canvas").getContext("2d");
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
                    title:{
                        display: true,
                        text: 'Monthly Orders'
                    }
                }
            });
        };
    </script>
</body>
</html>