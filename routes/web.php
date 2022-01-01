<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;   
use App\Http\Controllers\DashboardController;

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

//Auth::routes(['verify' => true ]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','verified'])->group(function () {

    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::Resource('users', UserController::class)->only(['index','create','store','edit','update','disable']);
    Route::post('users/{user}/disable',[UserController::class,'disable'])->name('users.disable');

});



