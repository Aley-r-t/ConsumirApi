<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function getCharacters()
    {
        $client = new Client(); // Crear una instancia del cliente Guzzle
        
        // Realizar la petición GET a la API
        $response = $client->request('GET', 'https://dragonball-api.com/api/characters');
        
        // Obtener el contenido de la respuesta
        $data = json_decode($response->getBody(), true);

        // Filtrar los elementos si es necesario
        $characters = $data['items'] ?? [];

        // Retornar la data a una vista o como JSON
        return view('welcome', ['characters' => $characters]);
        // return response()->json($characters);
    }
}
