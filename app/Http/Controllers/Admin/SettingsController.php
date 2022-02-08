<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SettingsService;

class SettingsController extends Controller
{
    protected $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    public function wallets()
    {
        $wallets = $this->settingsService->getWallets();

        return view('admin.wallets')->with('wallets', $wallets);
    }

    public function editWalletInfo($code)
    {
        $coin = $this->settingsService->getWalletFromCode($code);
        $networks = $this->settingsService->getPossibleNetworks($code);

        return view('admin.wallet_edit', compact('coin', 'networks'));
    }

    public function updateWalletInfo(Request $request, $code)
    {
        $this->settingsService->updateWalletInfo($request->all(), $code);

        session()->flash('success', 'Wallet information updated');

        return redirect()->route('admin.wallets');
    }

    public function rates()
    {
        $coins = $this->settingsService->getWallets();
        return view('admin.rates', compact('coins'));
    }
}
