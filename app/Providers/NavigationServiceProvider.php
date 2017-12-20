<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Laravel\View;

/**
 * Class NavigationServiceProvider
 *
 * @package \App\Providers
 */
class NavigationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Menu::macro('admin', function () {
            return Menu::new()
                ->addClass('list-reset')
                ->setActiveClass('border-green')
                ->addItemClass('block p-4 text-grey-darker font-bold border-grey-lighter')
                ->addItemParentClass('hover:border-green hover:bg-grey-lighter border-r-4')
                ->action('OverviewController@index', 'Overview')
                ->action('PostController@index', 'Posts')
                ->action('PageController@index', 'Pages')
                ->action('CategoryController@index', 'Categories')
                ->setActiveFromRequest('/');
        });
    }
}
