<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
    <nav>
        <ul>
            <li>Users</li>
            <li>Orders</li>
            <li>Reports</li>
            <li>Features</li>
        </ul>
    </nav>
    <main>
        <section id="welcome">
            <h1>Welcome Admin!</h1>
        </section>
        <section id="at-glance">
            <h1>At a Glance</h1>
            <div class="info">
                <div class="pending">
                    <h2>Pending orders</h2>
                    <div>
                        {{$ordercount}}
                    </div>
                </div>
                <div class="sales">
                    <h2>Sales Today</h2>
                    <div>
                        {{$total}}
                    </div>
                </div>
                <div class="features">
                    <h2>Feature Requests</h2>
                </div>
            </div>
        </section>
    </main>
</body>
</html>