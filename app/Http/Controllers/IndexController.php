<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Info;
use App\Models\Ticket;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home()
    {
        $packages = DB::table('packages')->select('name_package')->get();
        return view('pages.home', ['packages' => $packages]);
    }

    public function event()
    {
        $slideCount = 0;
        $events = Event::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('pages.events', compact('events', 'slideCount'));
    }
    public function detail($slug)
    {
        $detail = Event::where('slug', $slug)->where('status', 1)->first();
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
