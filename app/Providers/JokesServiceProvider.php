<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;


class JokesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'joke', function(){
                $client = new Client();
                $response = $client->request('GET','https://official-joke-api.appspot.com/random_joke');
                $joke = json_decode($response->getBody());
                return $joke->setup . ' ' . $joke->punchline;
            }
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
