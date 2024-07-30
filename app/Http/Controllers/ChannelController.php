<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    //
    public function getApisChannel()
    {
        $client =  new Client();  //creando la instancia del cliente

        //Realizar la peticion GET a la Api
        $response = $client->request('GET','https://iptv-org.github.io/api/channels.json');

        //obtener los datos de la respuesta
        $data =  json_decode($response->getBody(),true);

        $characters  = array_slice($data, 0, 10);

        return view('apichannel',['characters' => $characters]);
    }
}
