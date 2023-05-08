<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BrasilAPIService;
use App\Services\IBGEAPIService;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $result = [];

        if (env('PROVIDER_API_CITY') == 'BRASIL_API_URL') {
            $result = (new BrasilAPIService())->get($request->uf);
        }

        if (env('PROVIDER_API_CITY') == 'IBGE_URL') {
            $result = (new IBGEAPIService())->get($request->uf);
        }
        
        return $result;
    }
}
