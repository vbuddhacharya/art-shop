<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    <main>
        <section>
            <div>
                <h1>Customers</h1>
                <p>{{$custcount}}</p>
                <table class="table align-middle table-hover" style="margin:auto; text-align:center">
                    <thead>
                    <tr class="color">
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Email</th>
                        <th scope="col">Orders</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $cust)
                        <tr>
                            <td>{{$cust->name}}</td>
                            <td>{{$cust->contact}}</td>
                            <td>{{$cust->email}}</td>
                            <td>{{$cust->order_count}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </section>
        <section>
            <div>
                <h1>Artists</h1>
                <p>{{$artistcount}}</p>
                <table class="table align-middle table-hover" style="margin:auto; text-align:center">
                    <thead>
                    <tr class="color">
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Email</th>
                        <th scope="col">Items</th>
                        <th scope="col">Orders</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($artists as $artist)
                        <tr>
                            <td>{{$artist->name}}</td>
                            <td>{{$artist->contact}}</td>
                            <td>{{$artist->email}}</td>
                            <td>{{$artist->art_count}}</td>
                            <td>{{$artist->order}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>