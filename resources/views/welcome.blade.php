<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        .spanm{
            color: blue
        }
    </style>
    <h1 class="spanm">Dragon Ball Characters</h1>
    <ul>
        @foreach ($characters as $character)
            <li>
                <img src="{{ $character['image'] }}" alt="{{ $character['name'] }}" width="100">
                <h2>{{ $character['name'] }}</h2>
                <p><strong>Ki:</strong> {{ $character['ki'] }}</p>
                <p><strong>Max Ki:</strong> {{ $character['maxKi'] }}</p>
                <p><strong>Race:</strong> {{ $character['race'] }}</p>
                <p><strong>Gender:</strong> {{ $character['gender'] }}</p>
                <p><strong>Description:</strong> {{ $character['description'] }}</p>
                <p><strong>Affiliation:</strong> {{ $character['affiliation'] }}</p>
            </li>
        @endforeach
    </ul>
    
</body>
</html>