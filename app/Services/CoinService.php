<?php

namespace App\Services;

use App\Models\Coin;

class CoinService
{
    public function getAllCoins()
    {
        return Coin::all();
    }

    public function getCoinFromId($coinId)
    {
        return Coin::find($coinId);
    }

    public function storeCoin($data)
    {
        //ignore validateion for now.
        $coin = new Coin;
        return $this->saveCoin($data, $coin);
    }

    public function updateCoin($data, $coinId)
    {
        $coin = $this->getCoinFromId($coinId);

        return $this->saveCoin($data, $coin);
    }

    public function saveCoin($data, $coin)
    {
        //save the coin information 
        $coin->name = $data['coin_name'];
        $coin->symbol = $data['symbol'];

        if(isset($data['is_active']))
        {
            $coin->is_active = true;
        }
        else {
            $coin->is_active = false;
        }

        //update the file and get the resulting path.
        //update the file.
        if(isset($data['icon']))
        {
            $file = $data['icon'];
            $path = $this->uploadFile($file);

            $coin->logo_path = $path;
        }

        //delete previous icon if necessary.
        $coin->save();

        return $coin;
    }

    private function uploadFile($file)
    {
        $name = $file->getClientOriginalName();

        $path = $file->storePubliclyAs(Coin::STORAGE_PATH, $name);

        $path = "storage/" . $path;

        return $path;
    }
}