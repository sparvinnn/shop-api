<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Color;
use Illuminate\Http\Request;

class GivController extends Controller
{
    public function init(){
        $this->branchs();
        $this->colors();
    }

    private function branchs(){
        $client = new \GuzzleHttp\Client(); 
        $res    = $client->request('GET', env('API_REQUEST_URL').'client', [
            'headers' => [
                'WEB_TOKEN' => env('WEB_TOKEN')
            ]
        ]);

        $data = json_decode($res->getBody());
        
        foreach($data->Value as $item)
            Branch::create([
                'giv_id'        =>  $item->ClientID,
                'name'          =>  $item->ClientName,
                'address'       =>  $item->ClientAddress
            ]);
    }

    private function colors(){
        $client = new \GuzzleHttp\Client(); 
        $res    = $client->request('GET', env('API_REQUEST_URL').'itemcolor', [
            'headers' => [
                'WEB_TOKEN' => env('WEB_TOKEN')
            ]
        ]);

        $data = json_decode($res->getBody());
        
        foreach($data->Value as $item)
            Color::create([
                'giv_id'    => $item->ItemColorID,
                'name'      => $item->ItemColorName,
            ]);
    }
}
