<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\ManyToManyController;

// One To One
Route::get('one-to-one', [OneToOneController::class, 'oneToOne']);
Route::get('one-to-one-inverse', [OneToOneController::class, 'oneToOneInverse']);
Route::get('one-to-one-insert', [OneToOneController::class, 'oneToOneInsert']);

// One To Many
Route::get('one-to-many', [OneToManyController::class, 'oneToMany']);
Route::get('many-to-one', [OneToManyController::class, 'manyToOne']);
Route::get('one-to-many-two', [OneToManyController::class, 'oneToManyTwo']);
Route::get('one-to-many-insert', [OneToManyController::class, 'oneToManyInsert']);
Route::get('one-to-many-insert-two', [OneToManyController::class, 'oneToManyInsertTwo']);

// Has Many Through
Route::get('has-many-through', [OneToManyController::class, 'hasManyThrough']); 

// Many To Many
Route::get('many-to-many', [ManyToManyController::class, 'manyToMany']);
Route::get('many-to-many-inverse', [ManyToManyController::class, 'manyToManyInverse']);
Route::get('many-to-many-insert', [ManyToManyController::class, 'manyToManyInsert']);

Route::get('/', function () {
    return view('welcome');
});
