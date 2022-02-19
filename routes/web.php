<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserPagesController;
use App\Http\Controllers\Admin\CoinsController;
use App\Http\Controllers\Admin\RatesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TransactionsController;

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

    
    Route::group(['prefix' => 'transactions'], function(){
        Route::get('/', [TransactionsController::class, 'index'])->name('admin.transactions');
        Route::get('/pending', [TransactionsController::class, 'pendingTransactions'])->name('admin.transactions.pending');
        Route::get('/confirmed', [TransactionsController::class, 'confirmedTransactions'])->name('admin.transactions.confirmed');
        Route::get('/completed', [TransactionsController::class, 'completedTransactions'])->name('admin.transactions.completed');
    });

    Route::group(['prefix', 'settings'], function(){
        Route::get('/wallets', [SettingsController::class, 'wallets'])->name('admin.wallets');
        Route::get('/wallets/{code}/edit', [SettingsController::class, 'editWalletInfo'])->name('admin.wallet.edit');
        Route::post('/wallets/{code}/update', [SettingsController::class, 'updateWalletInfo'])->name('admin.wallet.update');
        Route::group(['prefix' => 'rates'], function(){
            Route::get('/', [RatesController::class, 'index'])->name('admin.rates');
            Route::get('/{code}/new', [RatesController::class, 'new'])->name('admin.rates.new');
            Route::post('/{code}/store', [RatesController::class, 'store'])->name('admin.rate.store');
            Route::get('/{id}/edit', [RatesController::class, 'edit'])->name('admin.rate.edit');
            Route::post('/{id}/update', [RatesController::class, 'update'])->name('admin.rate.update');
            Route::get('/{id}/delete', [RatesController::class, 'delete'])->name('admin.rate.delete');
        });
    });
});

Route::group(['prefix' => 'user'], function(){
    Route::get('/', [HomeController::class, 'userHome'])->name('user.dashboard');
    Route::get('/home', [HomeController::class, 'userHome'])->name('user.home'); //same result as above.
    Route::get('/transactions', [UserPagesController::class, 'transactions'])->name('user.transactions');
    Route::get('/capture-transaction', [UserPagesController::class, 'showCaptureView'])->name('user.transaction.capture.show');
    Route::post('/capture-transaction', [UserPagesController::class, 'captureTransaction'])->name('user.transaction.capture');
    Route::get('/profile', [UserPagesController::class, 'showProfile'])->name('user.profile');
    Route::get('/profile/edit', [UserPagesController::class, 'editProfile'])->name('user.profile.edit');
    Route::post('/profile/basic/update', [UserPagesController::class, 'updateBasicInfo'])->name('user.profile.basic.update');
    Route::post('/profile/payout/update', [UserPagesController::class, 'updatePayoutInfo'])->name('user.profile.payout.update');
    Route::get('/settings', [UserPagesController::class, 'settings'])->name('user.settings');
});
