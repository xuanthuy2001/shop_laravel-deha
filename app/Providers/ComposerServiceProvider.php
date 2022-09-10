<?php

namespace App\Providers;

use App\Composers\CartComposer;
use App\Composers\CategoryComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
  
    public function register()
    {
        //
    }

    
    public function boot()
    {
        View::composer('client.layouts.app',CategoryComposer::class);
        View::composer('client.layouts.app',CartComposer::class);
    }
}
