<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\RatesService;
use App\Http\Controllers\Controller;
use App\Services\CoinService;

class RatesController extends Controller
{
    protected $rateService;
    protected $coinService;

    public function __construct(
        RatesService $rateService,
        CoinService $coinService
    )
    {
        $this->rateService = $rateService;
        $this->coinService = $coinService;
    }

    public function index()
    {
        $coins = $this->rateService->getCoinsWithRates();

        return view('admin.rates', compact('coins'));
    }

    public function new($code)
    {
        return view('admin.rate_new')->with('code', $code);
    }

    public function store(Request $request, $code)
    {
        $coin = $this->coinService->getCoinFromCode($code);
        $this->rateService->addNewRate($request->all(), $coin);

        session()->flash('success', "New Rate Added successfully");

        return redirect()->route('admin.rates');
    }

    public function edit($rateId)
    {
        $rate = $this->rateService->getRateFromId($rateId);

        return view('admin.rate_edit', compact('rate'));
    }

    public function update(Request $request, $rateId)
    {
        $this->rateService->updateRate($request->all(), $rateId);

        session()->flash('success', "Rate information updated");

        return redirect()->route('admin.rates');
    }

    public function delete($rateId)
    {
        $this->rateService->deleteRate($rateId);

        session()->flash('success', "Rate Deleted");

        return redirect()->route('admin.rates');
    }
}
