<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class CaptureBtcTransactionService
{
    public function captureTransaction($hash)
    {
        //capture the transaction 

        //validate the hash..

        $data = $this->getTransactionData($hash);

    }

    private function getTransactionData($hash)
    {
        $cryptoApikey = config('app.crypto_api_key', '');
        $url = $this->getUrl($hash);
        $headers = [
            'X-API-Key' => $cryptoApikey
        ];

        $result = $this->makeRequest($url, $headers);

        $statusCode = $result->status();
        $body = $result->body();
        $reason = $result->reason();

        dd($statusCode, $body, $reason);
    }

    private function makeRequest($url, $headers)
    {
        $data = Http::withHeaders($headers)->get($url);
        return $data;
    }

    private function getUrl($hash)
    {
        $blockchain = "bitcoin";
        $network = "mainnet";

        $url = "https://rest.cryptoapis.io/v2/blockchain-data/" 
                . $blockchain . "/" . $network . "/transactions/"
                . $hash;

        return $url;
    }
}