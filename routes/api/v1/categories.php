<?php

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;


Route::get('/categories', function (Request $request) {
    return new JsonResource([
        'data' => 'aaa'
    ]);
});