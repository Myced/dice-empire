<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\CoinService;
use App\Http\Controllers\Controller;

class CoinsController extends Controller
{
    protected $coinService;

    public function __construct(CoinService $coinService)
    {
        $this->coinService = $coinService;
    }

    public function index()
    {
        $coins = $this->coinService->getAllCoins();

        return view('admin.coins_all', compact('coins'));
    }

    public function create()
    {
        return view('admin.coin_create');
    }

    public function store(Request $request)
    {
        $this->coinService->storeCoin($request->all());

        session()->flash('success', 'Coin Created successfully');

        return redirect()->route('admin.coins');
    }

    public function edit($id)
    {
        $coin = $this->coinService->getCoinFromId($id);

        return view('admin.coin_edit', compact('coin'));
    }

    public function update(Request $request, $id)
    {
        $this->coinService->updateCoin($request->all(), $id);

        session()->flash('success', 'Coin Updated');

        return redirect()->route('admin.coins');
    }
}
