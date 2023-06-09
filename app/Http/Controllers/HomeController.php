<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    public function index(Request $request)
    {
            $packageStatistics = Order::select('package_name', DB::raw('count(*) as total'))
                ->groupBy('package_name')
                ->orderByDesc('total')
                ->get();
        $packageNames = $packageStatistics->pluck('package_name');
        $packageCounts = $packageStatistics->pluck('total');

        $colors = ['#FF6384', '#36A2EB', '#FFCE56', '#33FF99', '#9966FF', '#FF9900'];

        return view('home', compact('packageNames', 'packageCounts', 'colors'));
    }
     public function statistics(Request $request)
    {
        $startDate = $request->input('start_date_static');
        $endDate = $request->input('end_date_static');

        if ($startDate && $endDate) {
            $packageStatistics = Order::select('package_name', DB::raw('count(*) as total'))
                ->whereBetween('created_at', [$startDate, $endDate])
                ->groupBy('package_name')
                ->orderByDesc('total')
                ->get();
        } else {
            $packageStatistics = Order::select('package_name', DB::raw('count(*) as total'))
                ->groupBy('package_name')
                ->orderByDesc('total')
                ->get();
        }

        $packageNames = $packageStatistics->pluck('package_name');
        $packageCounts = $packageStatistics->pluck('total');

        $colors = ['#FF6384', '#36A2EB', '#FFCE56', '#33FF99', '#9966FF', '#FF9900'];

        return view('home', compact('packageNames', 'packageCounts', 'colors', 'startDate', 'endDate'));
    }
}
