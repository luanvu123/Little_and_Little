<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Package;
use App\Models\Event;

class TicketBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function submit_Booking_Form(Request $request)
    {
        // Lưu thông tin người dùng vào session
        session()->put('package', $request->input('package'));
        session()->put('date', $request->input('date'));
        session()->put('fullname', $request->input('fullname'));
        session()->put('phone', $request->input('phone'));
        session()->put('email', $request->input('email'));
        session()->put('number', $request->input('number'));

        return redirect()->route('payment');
    }

    public function showBookingForm()
    {
        // Lấy thông tin người dùng từ session và truyền vào view payment.blade.php
        $packageName = session('package');
        $date = session('date');
        $fullname = session('fullname');
        $phone = session('phone');
        $email = session('email');
        $number = session('number');

        // Kiểm tra nếu một trong các thông tin bị thiếu thì quay trở lại trang đặt vé với thông báo lỗi
        if (!$packageName || !$date || !$fullname || !$phone || !$email || !$number) {
            return redirect()->route('homepage')->with('error', 'Vui lòng nhập đầy đủ thông tin để đặt vé.');
        }

        // Kiểm tra xem số lượng vé có lớn hơn 0 không
        if ($number <= 0) {
            return redirect()->route('homepage')->with('error', 'Số lượng vé phải lớn hơn 0.');
        }

        // Kiểm tra xem gói cước có tồn tại trong CSDL không
        $package = Package::where('name_package', $packageName)->first();
        if (!$package) {
            return redirect()->route('homepage')->with('error', 'Gói cước không tồn tại.');
        }

        // Tính tổng giá trị của đơn đặt vé và chuyển sang trang thanh toán
        $totalPrice = $package->price_package * $number;
        session()->forget(['package', 'date', 'fullname', 'phone', 'email', 'number']);
        return view('pages.payment', compact('packageName', 'date', 'fullname', 'phone', 'email', 'number', 'totalPrice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }
}
