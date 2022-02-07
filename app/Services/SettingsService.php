<?php
namespace App\Services;

use App\Models\Coin;
use App\Services\CoinService;

class SettingsService
{
    protected $coinService;

    public function __construct(CoinService $coinService)
    {
        $this->coinService = $coinService;
    }
    
    public function getWallets()
    {
        //wallets are directly mapped to coins.. 
        return $this->coinService->getAllCoins();
    }

    public function getWalletFromCode($code)
    {
        return $this->coinService->getCoinFromCode($code);
    }

    public function updateWalletInfo($data, $code)
    {
        $coin = $this->getWalletFromCode($code);

        $coin->network = $data['network'];
        $coin->address = $data['address'];

        $coin->save();
    }

    public function getPossibleNetworks($code)
    {
        //if its the bitcoin address 
        //IMPLETMENT A SWITCH HERE 
        $networks = [];

        switch($code) {
            case 'BTC':
                $networks = Coin::getBitcoinNetworks();
                break;

            case 'USDT': 
                $networks = Coin::getUsdtNetworks();
                break;

            default: 
                break;

        }

        return $networks;
    }
}