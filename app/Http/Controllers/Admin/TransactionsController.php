<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TransactionsService;

class TransactionsController extends Controller
{
    /**
     * @var TransactionsService $transactionsService
     */
    protected $transactionService;

    public function __construct(TransactionsService $transactionService)
    {
        $this->transactionService = $transactionService;
    }
    public function index()
    {
        $transactions = $this->transactionService->getAllTransactionsByLatest();

        return view('admin.transactions', compact('transactions'));
    }

    public function pendingTransactions()
    {
        $transactions = $this->transactionService->getPendingTransactions();
        return view('admin.transactions', compact('transactions'));
    }

    public function confirmedTransactions()
    {
        $transactions = $this->transactionService->getConfirmedTransactions();
        return view('admin.transactions', compact('transactions'));
    }

    public function completedTransactions()
    {
        $transactions = $this->transactionService->getCompletedTransactions();
        return view('admin.transactions', compact('transactions'));
    }
}
