<?php

namespace App\Providers;

use App\Http\Controllers\PublicC\NewPage;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\ServiceProvider;

class NewPageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 使用自定义分页模板
        Paginator::presenter(function (AbstractPaginator $paginator) {
            return new NewPage($paginator);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
