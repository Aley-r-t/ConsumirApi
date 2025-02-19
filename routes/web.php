<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\IPTVController;


Route::get('/characters', [ApiController::class, 'getCharacters']);
Route::get('/channels', [IPTVController::class, 'getChannels']);
Route::get('/final',[ChannelController::class, 'getApisChannel']);