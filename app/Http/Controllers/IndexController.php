<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Detail;
class IndexController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function event()
    {
        $slideCount = 0;
        $events = Event::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('pages.events', compact('events','slideCount'));
    }
    public function detail($slug)
    {

          $detail = Event::where('slug',$slug)->where('status',1)->first();
        return view('pages.details', compact('detail'));
    }
    public function payment()
    {
        return view('pages.payment');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function success()
    {
        return view('pages.success');
    }
}
