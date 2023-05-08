<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info = Info::find(1);
        return view('admin.info.form', compact('info'));
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
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'text1' => 'nullable',
            'logo' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'text2' => 'nullable',
            'text3' => 'nullable',
            'text4' => 'nullable',
            'text5' => 'nullable',
            'text6' => 'nullable',
            'text7' => 'nullable',
            'text8' => 'nullable',
            'text9' => 'nullable',
            'text10' => 'nullable',
            'address' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'phonenav' => 'nullable',
        ]);

        $info = Info::findOrFail($id);

        $info->text1 = $data['text1'];
        $info->text2 = $data['text2'];
        $info->text3 = $data['text3'];
        $info->text4 = $data['text4'];
        $info->text5 = $data['text5'];
        $info->text6 = $data['text6'];
        $info->text7 = $data['text7'];
        $info->text8 = $data['text8'];
        $info->text9 = $data['text9'];
        $info->text10 = $data['text10'];
        $info->address = $data['address'];
        $info->email = $data['email'];
        $info->phone = $data['phone'];
        $info->phonenav = $data['phonenav'];

         $get_image = $request->file('logo');

        if ($get_image) {
            $old_image_path = public_path('uploads/logo/' . $info->logo);
            if (file_exists($old_image_path) && is_file($old_image_path)) {
                unlink($old_image_path);
            }

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/logo/'), $new_image);
            $info->logo = $new_image;
        }

        $info->save();

        toastr()->info('Cập nhật', 'Cập nhật thông tin thành công.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
