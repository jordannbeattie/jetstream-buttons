<?php

namespace Jordanbeattie\JetstreamButtons;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Jordanbeattie\JetstreamButtons\Components\Danger;
use Jordanbeattie\JetstreamButtons\Components\Secondary;
use Jordanbeattie\JetstreamButtons\Components\Wrapper;
use Livewire\Livewire;
use Jordanbeattie\JetstreamButtons\Components\Primary;

class JetstreamButtonsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::componentNamespace('Jordanbeattie\\JetstreamButtons\\Components', 'buttons');
        $this->loadViewsFrom(__DIR__ . '/Views', 'buttons');
        $this->loadViewComponentsAs('buttons', [
            Primary::class,
            Secondary::class,
            Danger::class,
            Wrapper::class
        ]);
    }
}
