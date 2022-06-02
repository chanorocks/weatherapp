<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class VenueController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($city)
    {
		$client = new Client();
		$api = $client->request('GET', 'https://api.foursquare.com/v3/places/search', [
			'headers' => [
				'Accept' => 'application/json',
				'Authorization' => env('FOURSQUARE_API', null),
			],
			'query' => [
				'client_id' 	=> 	env('FOURSQUARE_CLIENT_ID', null),
				'client_secret'	=>	env('FOURSQUARE_SECRET', null),
				'v'				=>	date('Ymd'),
				'near'			=>	$city,
			]
		]);
		return response()->json(json_decode($api->getBody()));
    }
}
