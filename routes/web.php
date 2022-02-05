<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return redirect()->home();
});

Auth::routes();

Route::get('/home', function() {
    return redirect()->route('user.home');
})->name('home');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [HomeController::class, 'adminDashboard'])->name('admin');
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::group(['prefix' => 'user'], function(){
    Route::get('/', [HomeController::class, 'userHome'])->name('user.dashboard');
    Route::get('/home', [HomeController::class, 'userHome'])->name('user.home'); //same result as above.
});
