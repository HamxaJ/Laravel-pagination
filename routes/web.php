<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Opportunities;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/opportunities', Opportunities::class);
