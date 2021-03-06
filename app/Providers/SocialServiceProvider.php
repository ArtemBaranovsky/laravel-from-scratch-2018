<?php

namespace App\Providers;

use App\Services\Twitter;
use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Twitter::class, function (){
//            dd('hello');
//            return new Twitter('api-key');
            return new Twitter(config('services.twitter.secret'));   // load key from config/...
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
