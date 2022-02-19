<?php
namespace App\Services;

use Exception;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $user = null;
    private $coinService;

    public function __construct(CoinService $coinService, $user = null)
    {
        $this->coinService = $coinService;

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

    public function getUser()
    {
        return $this->user;
    }

    public function getCoins()
    {
        return $this->coinService->getAllCoins();
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

    public function updateBasicInfo($data)
    {
        $user = $this->user;
        
        //TODO:: validate fields.
        $user->name = $data['name'];
        $user->tel = $data['tel'];

        $user->save();
    }

    public function updatePayoutInformation($data)
    {
        $user = $this->user;

        $user->payout_network = $data['payout_network'];
        $user->payout_type = $data['payout_type'];
        $user->payout_number = $data['payout_tel'];

        $user->save();
    }

    public function updatePassword($data)
    {
        $user = $this->user;
        
        $oldPassword = $data['old_password'];
        $newPassword = $data['password'];
        
        //check that the old password is correct. 
        $passwordCorrect = Hash::check($oldPassword, $user->password);

        if( ! $passwordCorrect )
            throw new Exception("Old Password incorrect");

        //then passwords have been confirmed... set the new password
        $user->password = Hash::make($newPassword);

        $user->save();

    }
}