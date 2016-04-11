<?php

namespace App\Yelp;

use GuzzleHttp\Client;

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
        $response = $this->client->get("v2/search/?location=90291&sort=0&category_filter=mexican&limit=10", ['auth' => 'oauth']);
        $index = rand(0, 9);
        $results_array = array_pluck(json_decode($response->getBody(), true)['businesses'], 'name');

        return $results_array[$index];
    }
}