<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BirthDateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/create', [BirthDateController::class, 'createNew']);

Route::get('/', [BirthDateController::class, 'getAll']);

Route::get('/update/{id}', [BirthDateController::class, 'getDate']);

Route::get('/delete/{id}', [BirthDateController::class, 'delete']);

Route::post('/update/{id}', [BirthDateController::class, 'update']);

Route::post('/create', [BirthDateController::class, 'create']);
