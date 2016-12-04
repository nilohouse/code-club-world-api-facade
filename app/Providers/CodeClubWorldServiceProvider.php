<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Helpers\CodeClubWorld;

use Vinelab\Http\Client as HttpClient;

class CodeClubWorldServiceProvider extends ServiceProvider
{
    //protected $defer = true;

    public function register()
    {
        $this->app->bind('App\Helpers\Contracts\CodeClubWorldContract', function() {
            return new CodeClubWorld(new HttpClient);
        });
    }

    public function provides()
    {
        return ['App\Helpers\Contracts\CodeClubWorldContract'];
    }
}
