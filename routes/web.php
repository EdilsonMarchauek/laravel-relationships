<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OneToOneController;

// One To One
Route::get('one-to-one', [OneToOneController::class, 'oneToOne']);

Route::get('/', function () {
    return view('welcome');
});
