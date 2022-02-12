<?php
namespace App\Services;

use Exception;
use App\Models\User;
use App\Models\Transaction;

class UserService
{
    private $user = null;

    public function __construct($user = null)
    {
        if($user == null)
        {
            $user = auth()->user();
        }

        $this->user = $user;
    }

    public function setUser(User $user)
    {
        if($user == null){
            throw new Exception("User cannot be null");
        }

        $this->user = $user;
    }

    public function getUserLatestTransactions()
    {
        $limit = 5;

        return $this->getUserTransactions($limit);
    }

    public function getUserTransactions($limit = null)
    {
        $builder = Transaction::where('user_id', $this->user->id);

        if($limit == null)
        {
            $builder = $builder->latest();
        }
        else {
            $builder = $builder->latest()->limit($limit);
        }

        $transactions = $builder->get();

        return $transactions;
    }
}