<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetCityController extends Controller
{
    public function index(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $city = $client->request('GET', 'https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => env('RAJA_ONGKIR_API'),
            ]
        ]);
        $dataCity = \GuzzleHttp\json_decode($city->getBody());
        $city = collect($dataCity->rajaongkir->results);
        // $city = $city->where('province_id', $request->province_id)->pluck('city_name', 'city_id');
        $city = $city->where('province_id', $request->province_id)->take($city->count());
        // $city = $city->where('province_id', $request->province_id)->get();
        return response()->json($city);
    }
}
