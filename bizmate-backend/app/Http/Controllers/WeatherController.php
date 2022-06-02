<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class WeatherController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$cityArr = ['Tokyo', 'Yokohama', 'Kyoto', 'Osaka', 'Sapporo', 'Nagoya'];
		$weatherInfo = [];

		$client = new Client();
		foreach ($cityArr as $city) {
			$api = $client->request('GET', 'http://api.openweathermap.org/data/2.5/forecast', [
				'query' => [
					'q' 	=> 	$city,
					'id'	=>	1850144,
					'appid'	=>	env('OPENWEATHERMAP_API', null),
					'units'	=>	'metric'
				]
			]);
			$weatherInfo[] = json_decode($api->getBody());
		}
		return response()->json($weatherInfo);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($city)
	{
		$client = new Client();
		$api = $client->request('GET', 'http://api.openweathermap.org/data/2.5/forecast', [
			'query' => [
				'q' 	=> 	$city,
				'id'	=>	1850144,
				'appid'	=>	env('OPENWEATHERMAP_API', null),
				'units'	=>	'metric'
			]
		]);
		$weatherInfo = json_decode($api->getBody());
		return response()->json($weatherInfo);
	}
}
