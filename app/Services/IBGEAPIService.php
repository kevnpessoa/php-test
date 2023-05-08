<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class IBGEAPIService
{
    public function get($uf)
    {
        $response = Http::get(str_replace('{UF}', $uf, env('IBGE_URL')));

        $cities = array_map(function ($city) {
            $new = [];
            $new['name'] = $city['nome'];
            $new['ibge_code'] = $city['id'];
            return $new;
        }, $response->json());

        return $cities;
    }

    public function getResponse($uf)
    {
        $response = Http::get(str_replace('{UF}', $uf, env('IBGE_URL')));

        return $response;
    }
}