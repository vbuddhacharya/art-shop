<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        @foreach ($pending as $p)
            <td>{{$p->art->name}}</td>
            <td>
                <form action="{{route('features.add')}}" method="post">
                    @csrf
                    <input type="hidden" name="featureid" value="{{$p->id}}">
                    <button type="submit">Feature</button>
                </form>
            </td>
        @endforeach
    </table>
    <table>
        @foreach ($running as $r)
            <td>{{$r->art->name}}</td>
            
        @endforeach
    </table>
</body>
</html>