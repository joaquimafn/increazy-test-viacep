<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class ViaCepService
{
    private $clientHttp;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->clientHttp = new Client([
            'base_uri' => 'https://viacep.com.br',
            'verify' => false
        ]);
    }

    public function getZipCode($zipcode) {
        $dataZipCode = $this->clientHttp->get("/ws/$zipcode/json");

        return $dataZipCode->getBody()->getContents();
    }
}
