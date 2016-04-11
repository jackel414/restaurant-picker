<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$auth = new \GuzzleHttp\Subscriber\Oauth\Oauth1([
		'consumer_key'    => env('YELP_CONSUMER_KEY'),
		'consumer_secret' => env('YELP_CONSUMER_SECRET'),
		'token'           => env('YELP_TOKEN'),
		'token_secret'    => env('YELP_TOKEN_SECRET')
	]);

	$stack = \GuzzleHttp\HandlerStack::create();

	$stack->push($auth);

	$client = new \GuzzleHttp\Client([
		'base_uri' => 'https://api.yelp.com/',
		'handler'  => $stack
	]);

	$response = $client->get("v2/search/?location=90291&sort=1&category_filter=mexican", ['auth' => 'oauth']);

	$results = array_pluck(json_decode($response->getBody(), true)['businesses'], 'name');

	foreach ( $results as $result ) {
		echo $result . "<br />";
	}
});
