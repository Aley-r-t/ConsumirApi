<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::get('/characters', [ApiController::class, 'getCharacters']);