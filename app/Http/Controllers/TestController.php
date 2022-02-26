<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        $client = new \GuzzleHttp\Client(); 
        $res    = $client->request('GET', env('API_REQUEST_URL').'client', [
            'headers' => [
                'WEB_TOKEN' => env('WEB_TOKEN')
            ]
        ]);

        $data = json_decode($res->getBody());

        // return $data->Value;
        
        foreach($data->Value as $item)
            // return $item->ClientID;
        
            Branch::create([
                'client_id'     =>  $item->ClientID,
                'name'          =>  $item->ClientName,
                'address'       =>  $item->ClientAddress
            ]);
    }
}
