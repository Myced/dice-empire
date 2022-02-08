<?php
namespace App\Services;

use App\Models\Coin;
use App\Models\Rate;

class RatesService
{
    public function getRateFromId($id)
    {
        return Rate::find($id);
    }

    public function getCoinsWithRates()
    {
        return Coin::with('rates')->get();
    }

    public function addNewRate($data, Coin $coin)
    {
        $rate = new Rate;
        
        $this->saveRate($rate, $coin, $data);
    }

    public function updateRate($data, $rateId)
    {
        $rate = $this->getRateFromId($rateId);

        $this->saveRate($rate, null, $data);
    }

    public function saveRate(Rate $rate, Coin $coin = null, $data)
    {
        $rate->min = $data['min'];
        $rate->max = $data['max'];
        $rate->price = $data['price'];
        $rate->comment = $data['comment'];
        
        if($coin != null)
        {
            $rate->coin_id = $coin->id;
            $rate->coin_symbol = $coin->symbol;
        }

        $rate->save();
    }

    public function deleteRate($rateId)
    {
        Rate::destroy($rateId);
    }
}