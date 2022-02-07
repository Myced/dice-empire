<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CoinsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Services\SettingsService;

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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'adminDashboard'])->name('admin');
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::group(['prefix' => 'coins'], function(){
        Route::get('/', [CoinsController::class, 'index'])->name('admin.coins');
        Route::get('/create', [CoinsController::class, 'create'])->name('admin.coin.create');
        Route::post('/store', [CoinsController::class, 'store'])->name('admin.coin.store');
        Route::get('/{id}/edit', [CoinsController::class, 'edit'])->name('admin.coin.edit');
        Route::post('/{id}/update', [CoinsController::class, 'update'])->name('admin.coin.update');
    });

    Route::group(['prefix', 'settings'], function(){
        Route::get('/wallets', [SettingsController::class, 'wallets'])->name('admin.wallets');
        Route::get('/wallets/{code}/edit', [SettingsController::class, 'editWalletInfo'])->name('admin.wallet.edit');
        Route::post('/wallets/{code}/update', [SettingsController::class, 'updateWalletInfo'])->name('admin.wallet.update');
        Route::get('/rates', [SettingsController::class, 'rates'])->name('admin.rates');
    });
});

Route::group(['prefix' => 'user'], function(){
    Route::get('/', [HomeController::class, 'userHome'])->name('user.dashboard');
    Route::get('/home', [HomeController::class, 'userHome'])->name('user.home'); //same result as above.
});
