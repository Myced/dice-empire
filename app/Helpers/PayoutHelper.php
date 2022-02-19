<?php
namespace App\Helpers;

use App\Models\Payout;

class PayoutHelper
{
    public static function getPayoutNetworks(){
        return Payout::getPayoutNetworks();
    }

    public static function getPayoutTypes()
    {
        return Payout::getPayoutTypes();
    }
}