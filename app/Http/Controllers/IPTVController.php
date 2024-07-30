<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IPTVController extends Controller
{
    public function getChannels()
    {
        $client = new Client();
        $response = $client->get('https://iptv-org.github.io/iptv/index.m3u');
        $m3uContent = $response->getBody()->getContents();
        $channels = $this->parseM3U($m3uContent);

        // Limit to the first channel
        $firstChannel = !empty($channels) ? $channels[0] : null;

        return view('channels', ['channels' => $firstChannel ? [$firstChannel] : []]);
    }

    private function parseM3U($content)
    {
        $channels = [];
        $lines = explode("\n", $content);
        $channel = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (strpos($line, '#EXTINF:') === 0) {
                $channel = $this->parseExtinf($line);
            } elseif (filter_var($line, FILTER_VALIDATE_URL)) {
                $channel['url'] = $line;
                $channels[] = $channel;
                // Stop after finding the first channel
                if (count($channels) === 1) {
                    break;
                }
            }
        }
        return $channels;
    }

    private function parseExtinf($line)
    {
        $channel = [];
        $line = str_replace('#EXTINF:', '', $line);
        $parts = explode(',', $line, 2);

        $infoParts = explode(' ', $parts[0]);
        foreach ($infoParts as $info) {
            if (strpos($info, 'tvg-id=') === 0) {
                $channel['tvg-id'] = trim(str_replace(['tvg-id=', '"'], '', $info));
            } elseif (strpos($info, 'tvg-name=') === 0) {
                $channel['tvg-name'] = trim(str_replace(['tvg-name=', '"'], '', $info));
            } elseif (strpos($info, 'tvg-logo=') === 0) {
                $channel['tvg-logo'] = trim(str_replace(['tvg-logo=', '"'], '', $info));
            } elseif (strpos($info, 'group-title=') === 0) {
                $channel['group-title'] = trim(str_replace(['group-title=', '"'], '', $info));
            }
        }
        $channel['name'] = isset($parts[1]) ? trim($parts[1]) : '';
        return $channel;
    }
}
