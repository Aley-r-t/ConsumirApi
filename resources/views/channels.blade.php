<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/7.17.0/video.js"></script>
    <title>IPTV</title>
</head>
<body>
     <h1>IPTV Channels</h1>
    <ul>
        @foreach ($channels as $channel)
            <li>
                @if (isset($channel['tvg-logo']))
                    <img src="{{ $channel['tvg-logo'] }}" alt="{{ $channel['name'] }}" width="100">
                @endif
                <h2>{{ $channel['name'] }}</h2>
                @if (isset($channel['tvg-id']))
                    <p><strong>ID:</strong> {{ $channel['tvg-id'] }}</p>
                @endif
                @if (isset($channel['tvg-name']))
                    <p><strong>Name:</strong> {{ $channel['tvg-name'] }}</p>
                @endif
                @if (isset($channel['group-title']))
                    <p><strong>Group:</strong> {{ $channel['group-title'] }}</p>
                @endif
                <p><strong>URL:</strong> <a href="{{ $channel['url'] }}">{{ $channel['url'] }}</a></p>
                <!-- Video.js player -->
                <video id="video_{{ $loop->index }}" class="video-js vjs-default-skin" controls preload="auto" width="640" height="264"
                    data-setup='{}'>
                    <source src="{{ $channel['url'] }}" type="application/x-mpegURL">
                </video>
            </li>
        @endforeach
    </ul>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var players = document.querySelectorAll('.video-js');
            players.forEach(function(player) {
                videojs(player);
            });
        });
    </script>
</body>
</html>