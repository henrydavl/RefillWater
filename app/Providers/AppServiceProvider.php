<?php

namespace App\Providers;

use App\Gallon;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('nav.top_nav', function ($view){
            $view
                ->with('tickets', Ticket::all()->where('submitted_by', Auth::id())->where('is_done', '=', '0'))
                ->with('empty_gallons', Gallon::all()->where('is_empty', '1'));
        });
    }
}
