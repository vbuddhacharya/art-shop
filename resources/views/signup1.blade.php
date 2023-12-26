<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
</head>
<body>
    <form action="{{route('register')}}" method="post">
        @csrf
        <label for="name">Full Name 
            <input type="text" name="name" id="name">
        </label>
        <label for="username">Username
            <input type="text" name="username" id="username">
        </label>
        <label for="email">Email
            <input type="text" name="email" id="email">
        </label>
        <label for="password">Password
            <input type="password" name="password" id="password">
        </label>
        <label for="contact">Contact
            <input type="number" name="contact" id="contact">
        </label>
        <label for="usertype">Are you Artist or Buyer?
            <input type="radio" name="usertype" value="artist" id=""> Artist <br>
            <input type="radio" name="usertype" id="" value="customer"> Customer <br>
        </label>
        <button type="submit">Submit</button>
    </form>
</body>
</html>