<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Event;
use App\Models\Info;
use App\Models\Package;
use App\Models\Order;

use Carbon\Carbon;
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
        $info = Info::find(1);
        $event_total = Event::all()->count();
        $package_total = Package::all()->count();
        $about_total = Contact::all()->count();
        $order_total = Order::all()->count();

          $list_contact = Contact::orderBy('id', 'DESC')->get();
    $hasNewContacts = $list_contact->some(function ($contact) {
        return Carbon::parse($contact->created_at)->greaterThan(Carbon::now()->subHour());

    });

      $list_order = Order::orderBy('id', 'DESC')->get();
    $hasNewOrders = $list_order->some(function ($order) {
        return Carbon::parse($order->created_at)->greaterThan(Carbon::now()->subHour());
    });
    
        View::share([
            'info' => $info,
            'event_total' => $event_total,
            'package_total' => $package_total,
            'about_total' => $about_total,
            'order_total' => $order_total,

             'hasNewContacts' => $hasNewContacts,
              'hasNewOrders' => $hasNewOrders,

        ]);
    }
}
