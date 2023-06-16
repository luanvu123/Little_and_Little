<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
         $this->middleware('permission:package-list|package-create|package-edit|package-delete', ['only' => ['index','store']]);
         $this->middleware('permission:package-create', ['only' => ['create','store']]);
         $this->middleware('permission:package-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:package-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $list = Package::orderBy('id', 'ASC')->get();
        return view('admin.package.form', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_package' => 'required|string|max:255',
            'price_package' => 'required|numeric',
            'status' => 'nullable|string|max:255',
        ]);
        $package = new Package();
        $package->name_package = $data['name_package'];
        $package->price_package = $data['price_package'];

        $package->status = $data['status'];
        $package->save();


        toastr()->success('Thành công', 'Thêm gói thành công');
        return redirect()->back();
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
        $package = Package::find($id);
        $list = Package::orderBy('id', 'ASC')->get();
        return view('admin.package.form', compact('list', 'package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name_package' => 'required|string|max:255',
            'price_package' => 'required|numeric',
            'status' => 'nullable|string|max:255',
        ]);
        $package = Package::find($id);
        $package->name_package = $data['name_package'];
        $package->price_package = $data['price_package'];

        $package->status = $data['status'];
        $package->save();


        toastr()->success('Thành công', ' Cập nhật gói thành công');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Package::find($id)->delete();
        toastr()->info('Thành công', 'Xóa danh mục thành công');
        return redirect()->back();
    }
    public function goi_choose(Request $request)
    {
        $data = $request->all();
        $package = Package::find($data['id']);
        $package->status = $data['trangthai_val'];
        $package->save();
    }
}
