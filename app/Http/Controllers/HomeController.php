<?php

namespace App\Http\Controllers;

use App\Services\RatesService;
use App\Services\UserService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $ratesService;
    protected $userService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        RatesService $ratesService,
        UserService $userService
    )
    {
        $this->ratesService = $ratesService;
        $this->userService = $userService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function userHome()
    {
        //get the rates.
        $user = auth()->user();
        $this->userService->setUser($user);
        
        $coins = $this->ratesService->getCoinsWithRates();
        $transactions = $this->userService->getUserLatestTransactions();

        return view('user.home', compact('coins', 'transactions'));
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
