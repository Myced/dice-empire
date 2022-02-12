<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const TRANSACTION_STATUS_PENDING = "pending";
    const TRANSACTION_STATUS_CONFIRMING = "confirming";
    const TRANSACTION_STATUS_CONFIRMED = "confirmed";

    const PENDING = "pending";
    const CONFIRMED = "confirmed";
    const COMPLETED = "completed";
    const CANCELLED = "cancelled";
    const PAYOUT_FAILED = "payout_failed";
}
