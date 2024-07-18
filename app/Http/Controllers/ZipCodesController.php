<?php

namespace App\Http\Controllers;

use App\Http\Services\ViaCepService;

class ZipCodesController extends Controller
{
    private $viaCepService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->viaCepService = new ViaCepService();
    }

    public function search($zipcodes) {
        try {
            $arrayZipCode = explode(',', $zipcodes);
            $zipCodesFormmated = [];

            foreach ($arrayZipCode as $key => $value) {
                $data = $this->viaCepService->getZipCode($value);
                $zipCodesFormmated[] = json_decode($data, true);
            }

            return response()->json($zipCodesFormmated);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }

    }
}
