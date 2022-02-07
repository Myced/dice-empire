<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    const STORAGE_PATH = "images/coins";

    //the possible network for coins.
    const BICOIN_NETWORK = "bitcoin";

    const ERC20 = "ERC20";
    const TRC20 = "TRC20";
    const BEP2 = "BEP2";
    const BEP20 = "BEP20";

    public static function getUsdtNetworks()
    {
        return [
            self::ERC20 => 'Ethereum (ERC20)',
            self::TRC20 => 'Tron (TRC20)',
            self::BEP2 => 'Binance Chain (BEP2)',
            self::BEP20 => 'Binance Smart Chain (BEP20)'
        ];
    }

    public static function getBitcoinNetworks()
    {
        return [
            self::BICOIN_NETWORK => "Bitcoin Network"
        ];
    }
}
