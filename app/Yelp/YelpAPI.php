<?php

namespace App\Yelp;

use GuzzleHttp\Client;
use Request;

class YelpAPI
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Search Yelp globally
     *
     * @param $query
     *
     * @return array
     */
    public function option()
    {
        $category = Request::get('category');
        $zip = Request::get('zip');

        if ( $zip === '' || $category === '' ) {
            return false;
        }

        $response = $this->client->get("v2/search/?location=$zip&sort=0&category_filter=$category&limit=10", ['auth' => 'oauth']);
        $index = rand(0, 9);
        $results_array = json_decode($response->getBody(), true)['businesses'];

        return $results_array[$index];
    }
}