<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Event;
use App\Models\Info;
use App\Models\Package;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         $info=Info::find(1);
        $event_total=Event::all()->count();
          $package_total=Package::all()->count();
        View::share([
             'info' =>$info ,
              'event_total'=> $event_total,
              'package_total'=> $package_total
           ]);
    }
}
