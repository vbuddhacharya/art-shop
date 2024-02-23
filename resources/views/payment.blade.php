<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('pay')}}" method="POST">
        <input type="text" name="amt" value="1000">
        @csrf
    <button>Submit</button>
    </form>
</body>
</html>