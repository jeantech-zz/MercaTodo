<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register\RegisterController;   

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('register.store')->post('/registerClient', [RegisterController::class, 'store']);


