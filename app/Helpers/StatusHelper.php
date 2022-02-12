<?php
namespace App\Helpers;

use App\Models\Transaction;

class StatusHelper
{
    public static function getStatusLabel($status)
    {
        $labels = self::getStatusLabels();

        if(isset($labels[$status])){
            return $labels[$status];
        }

        return $status;
    }

    public static function getStatusColor($status)
    {
        $colors = self::getStatusColours();

        if( isset($colors[$status]) )
            return $colors[$status];

        //default color
        return "badge bg-pink";
    }

    public static function getTransactionStatusLabel($status)
    {
        $labels = self::getTransactionStatusLabels();

        if(isset($labels[$status])){
            return $labels[$status];
        }

        return $status;
    }

    public static function getTransactionStatusColor($status)
    {
        $colors = self::getTransactionStatusColours();

        if( isset($colors[$status]) )
            return $colors[$status];

        //default color
        return "badge bg-pink";
    }

    private static function getTransactionStatusLabels()
    {
        return [
            Transaction::TRANSACTION_STATUS_PENDING => "Pending",
            Transaction::TRANSACTION_STATUS_CONFIRMING => "Confirming",
            Transaction::TRANSACTION_STATUS_CONFIRMED => "Confirmed"
        ];
    }

    private static function getTransactionStatusColours()
    {
        return [
            Transaction::TRANSACTION_STATUS_PENDING => "badge bg-pink",
            Transaction::TRANSACTION_STATUS_CONFIRMING => "badge bg-pink",
            Transaction::TRANSACTION_STATUS_CONFIRMED => "badge bg-green"
        ];
    }

    private static function getStatusLabels()
    {
        return [
            Transaction::PENDING => "Pending",
            Transaction::CONFIRMED => "Confirmed",
            Transaction::CANCELLED => "Cancelled",
            Transaction::PAYOUT_FAILED => "Payout Failed",
            Transaction::COMPLETED => "Completed"
        ];
    }

    private static function getStatusColours()
    {
        return [
            Transaction::PENDING => "badge bg-pink",
            Transaction::CONFIRMED => "badge bg-orange",
            Transaction::CANCELLED => "badge bg-red",
            Transaction::PAYOUT_FAILED => "badge bg-red",
            Transaction::COMPLETED => "badge bg-green"
        ];
    }
}