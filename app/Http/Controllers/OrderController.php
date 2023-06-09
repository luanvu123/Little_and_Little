<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Order::orderBy('id', 'DESC')->get();
        $colorMap = [];
    $colors = ['#FF6384', '#36A2EB', '#FFCE56', '#33FF99', '#9966FF', '#FF9900'];

    foreach ($list as $cate) {
        $package_name = $cate->package_name;

        // Kiểm tra xem package_name đã có trong mảng kết hợp hay chưa
        if (!array_key_exists($package_name, $colorMap)) {
            // Nếu chưa có, gán màu mới cho package_name
            $colorMap[$package_name] = array_shift($colors);
        }
    }
        return view('admin.order.form', compact('list', 'colorMap'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::find($id)->delete();
        toastr()->info('Thành công', 'Xóa thành công');
        return redirect()->back();
    }
}
