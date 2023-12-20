<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($imageData as $data)
        
	     <img src="{{ url('/images/arts/'.$data->image) }}"
 style="height: 100px; width: 150px;">
	  
        @endforeach
</body>
</html>