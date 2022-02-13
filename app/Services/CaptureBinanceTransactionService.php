<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class CaptureBinanceTransactionService
{
    private $baseUrl = "https://api.binance.com";

    public function captureTransaction($hash)
    {
        $history = $this->getDepositHistory();
    }

    private function getCredentials()
    {
        $apiKey = config('app.binance_api_key');
        $apiSecret = config('app.binance_api_secret');

        return [
            'key' => $apiKey,
            'secret' => $apiSecret
        ];
    }

    private function getDepositHistory()
    {
        $endPoint = "/sapi/v1/capital/withdraw/history";
        $params = $this->getParameters();
        $signature = $this->getSignature(http_build_query($params));
        $headers = $this->getHeaders();

        //append the signature to the params.. 
        $params['signature'] = $signature;

        $url = $this->buildUrl($endPoint, $params);

        // dd($url);
        
        //make the request. 
        $response = $this->makeRequest($url, $headers);

        $statusCode = $response->status();
        $body = $response->body();
        $reason = $response->reason();


        dd($statusCode, $body, $reason);

    }

    private function makeRequest($url, $headers)
    {
        $response = Http::withHeaders($headers)->get($url);

        return $response;
    }

    private function getParameters()
    {
        $params = [
            'timestamp' => time(),
            'coin' => 'USDT',
            'limit' => 30,
        ];

        return $params;
    }

    private function getSignature($queryString)
    {
        $credentials = $this->getCredentials();
        $secret = $credentials['secret'];

        $signature = hash_hmac('sha256', $queryString, $secret);

        return $signature;
    }

    private function buildUrl($endPoint, $params)
    {
        $queryString = http_build_query($params);

        $url = $this->baseUrl . $endPoint . '?' . $queryString;

        return $url;
    }

    private function getHeaders()
    {
        $apiKey = $this->getCredentials()['key'];
        return [
            'Content-Type' => 'application/json',
            'X-MBX-APIKEY' => $apiKey
        ];
    }
}