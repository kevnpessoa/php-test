<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BrasilAPIService
{
    public function get($uf)
    {
        $response = Http::get(env('BRASIL_API_URL') . $uf);

        $cities = array_map(function ($city) {
            $new = [];
            $new['name'] = $city['nome'];
            $new['ibge_code'] = $city['codigo_ibge'];
            return $new;
        }, $response->json());

        return $cities;
    }

    public function getResponse($uf)
    {
        $response = Http::get(env('BRASIL_API_URL') . $uf);

        return $response;
    }
}