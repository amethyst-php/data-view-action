<?php

namespace Amethyst\Providers;

use Amethyst\Core\Providers\CommonServiceProvider;
use Amethyst\Models\DataViewAction;
use Amethyst\Observers\DataViewActionObserver;

class DataViewActionServiceProvider extends CommonServiceProvider
{
    /**
     * @inherit
     */
    public function register()
    {
        $this->app->register(\Amethyst\Providers\ActionServiceProvider::class);
        $this->app->register(\Amethyst\Providers\DataViewServiceProvider::class);

        parent::register();
    }

    /**
     * @inherit
     */
    public function boot()
    {
        DataViewAction::observe(DataViewActionObserver::class);

        parent::boot();
    }
}
