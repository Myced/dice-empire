<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    use HasFactory;

    const PAYOUT_NETWORK_MTN = "MTN";
    const PAYOUT_NETWORK_ORANGE = "ORANGE";

    const PAYOUT_TYPE_FLOAT = "FLOAT";
    const PAYOUT_TYPE_NORMAL = "NORMAL";

    public static function getPayoutNetworks()
    {
        return [
            self::PAYOUT_NETWORK_MTN,
            self::PAYOUT_NETWORK_ORANGE
        ];
    }

    public static function getPayoutTypes()
    {
        return [
            self::PAYOUT_TYPE_FLOAT,
            self::PAYOUT_TYPE_NORMAL
        ];
    }
}
