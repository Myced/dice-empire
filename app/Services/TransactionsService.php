<?php
namespace App\Services;

use App\Models\Transaction;

class TransactionsService
{
    public function __construct()
    {
        
    }

    public function getAllTransactionsByLatest()
    {
        return Transaction::latest()->get();
    }

    public function getPendingTransactions()
    {
        return Transaction::where('status', Transaction::PENDING)->latest()->get();
    }

    public function getConfirmedTransactions()
    {
        return Transaction::where('status', Transaction::CONFIRMED)->latest()->get();
    }

    public function getCompletedTransactions()
    {
        return Transaction::where('status', Transaction::COMPLETED)->latest()->get();
    }
}