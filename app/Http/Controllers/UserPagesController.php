<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\CaptureBtcTransactionService;
use App\Services\CaptureBinanceTransactionService;

class UserPagesController extends Controller
{
    protected $userService;
    protected $captureBtcTransactionService;
    protected $captureBinanceTransactionService;

    protected $user = null;

    public function __construct(
        UserService $userService,
        CaptureBtcTransactionService $captureBtcTransactionService,
        CaptureBinanceTransactionService $captureBinanceTransactionService
    )
    {
        $this->userService = $userService;
        $this->captureBtcTransactionService = $captureBtcTransactionService;
        $this->captureBinanceTransactionService = $captureBinanceTransactionService;

        //set the user for the userService.
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            $this->user = $user;
            $this->userService->setUser($user);
 
            return $next($request);
        });
    }

    //

    public function transactions()
    {
        $transactions = $this->userService->getUserTransactions();

        return view('user.transactions', compact('transactions'));
    }

    public function showCaptureView()
    {
        $coins = $this->userService->getCoins();

        return view('user.capture_transaction', compact('coins'));
    }

    public function captureTransaction(Request $request)
    {
        $hash = $request->hash;

        // $data = $this->captureBtcTransactionService->captureTransaction($hash);
        $data = $this->captureBinanceTransactionService->captureTransaction($hash);
       
    }

    public function showProfile()
    {
        $user = $this->user;

        return view('user.profile', compact('user'));
    }

    public function settings()
    {
        return view('user.settings');
    }
}
