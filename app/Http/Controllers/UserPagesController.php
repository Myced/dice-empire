<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserPagesController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

        //set the user for the userService.
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
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

    public function captureTransaction()
    {
        $coins = $this->userService->getCoins();

        return view('user.capture_transaction', compact('coins'));
    }

    public function settings()
    {
        return view('user.settings');
    }
}
