<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ApiView</title>
</head>
<body>
    <h1>Api haber si funciona</h1>
    @if(!empty($characters))
        <ul>
            @foreach ($characters as $character)
                <li>
                    <h2>{{ $character['name'] }}</h2>
                </li>
            @endforeach
        </ul>
    @else
        <p>No characters available.</p>
    @endif
</body>
</html>