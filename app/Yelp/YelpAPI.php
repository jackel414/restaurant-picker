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
    public function search()
    {
        $response = $this->client->get("v2/search/?location=90291&sort=1&category_filter=mexican", ['auth' => 'oauth']);
        return array_pluck(json_decode($response->getBody(), true)['businesses'], 'name');
    }
}