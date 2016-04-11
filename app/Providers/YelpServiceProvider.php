<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Yelp\YelpAPI;

class YelpServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('yelp', function()
        {
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

            return new YelpAPI($client);
        });
    }
}
