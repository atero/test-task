<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Helpers\Serializer;

class SerializerServiceProvider extends ServiceProvider
{
  protected $defer = false;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('App\Helpers\Contracts\ISerializer', function(){

        return new Serializer();
        
      });
    }
    
    public function provides()
    {
        return ['App\Helpers\Contracts\ISerialize'];
    }
}
