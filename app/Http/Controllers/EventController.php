<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Storage;
use File;
use Toastr;


class EventController extends Controller
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
        $list = Event::orderBy('id', 'ASC')->get();
        return view('admin.event.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Event::orderBy('id', 'ASC')->get();
        return view('admin.event.form', compact('list'));
    }
    public function trangthai_choose(Request $request)
    {
        $data = $request->all();
        $movie = Event::find($data['id']);
        $movie->status = $data['trangthai_val'];
        $movie->save();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $event = new Event();
        $event->title = $data['title'];
        $event->slug = $data['slug'];
        $event->title_order = $data['title_order'];
        $event->description1 = $data['description1'];
        $event->description2 = $data['description2'];
        $event->description3 = $data['description3'];
        $start_date = Carbon::createFromFormat('Y-m-d', $request->input('start_date'))->format('Y-m-d');
        $event->start_date = $start_date;

        $end_date = Carbon::createFromFormat('Y-m-d', $request->input('end_date'))->format('Y-m-d');
        $event->end_date = $end_date;

        $event->price = $data['price'];
        $event->status = $data['status'];

        //them anh
        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/event/', $new_image);
            $event->image = $new_image;
        }
        $get_image2 = $request->file('image2');
        if ($get_image2) {
            $get_name_image2 = $get_image2->getClientOriginalName();
            $name_image2 = current(explode('.', $get_name_image2));
            $new_image2 = $name_image2 . rand(0, 9999) . '.' . $get_image2->getClientOriginalExtension();
            $get_image2->move('uploads/event2/', $new_image2);
            $event->image2 = $new_image2;
        }
        $get_image3 = $request->file('image3');
        if ($get_image3) {
            $get_name_image3 = $get_image3->getClientOriginalName();
            $name_image3 = current(explode('.', $get_name_image3));
            $new_image3 = $name_image3 . rand(0, 9999) . '.' . $get_image3->getClientOriginalExtension();
            $get_image3->move('uploads/event3/', $new_image3);
            $event->image3 = $new_image3;
        }
        $event->save();
        toastr()->success('Thêm sự kiện thành công', 'Thành công');
        return redirect()->route('event.index');
    }

    public function update_image_event_ajax(Request $request)
    {
        $get_image = $request->file('file');
        $id = $request->id;

        if ($get_image) {
            //Xóa ảnh
            $event = Event::find($id);
            unlink('uploads/event/' . $event->image);

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/event/', $new_image);
            $event->image = $new_image;
            $event->save();
            toastr()->success('Thành công', 'Thay đổi ảnh thành công');
        }
    }
    public function update_image2_event_ajax(Request $request)
    {
        $get_image2 = $request->file('file2');
        $id = $request->id;

        if ($get_image2) {
            //Xóa ảnh
            $event = Event::find($id);
            unlink('uploads/event2/' . $event->image2);

            $get_name_image2 = $get_image2->getClientOriginalName();
            $name_image2 = current(explode('.', $get_name_image2));
            $new_image2 = $name_image2 . rand(0, 99) . '.' . $get_image2->getClientOriginalExtension();
            $get_image2->move('uploads/event2/', $new_image2);
            $event->image2 = $new_image2;
            $event->save();
            toastr()->success('Thành công', 'Thay đổi ảnh 2 thành công');
        }
    }

    public function update_image3_event_ajax(Request $request)
    {
        $get_image3 = $request->file('file3');
        $id = $request->id;

        if ($get_image3) {
            //Xóa ảnh
            $event = Event::find($id);
            unlink('uploads/event3/' . $event->image3);

            $get_name_image3 = $get_image3->getClientOriginalName();
            $name_image3 = current(explode('.', $get_name_image3));
            $new_image3 = $name_image3 . rand(0, 99) . '.' . $get_image3->getClientOriginalExtension();
            $get_image3->move('uploads/event3/', $new_image3);
            $event->image3 = $new_image3;
            $event->save();
            toastr()->success('Thành công', 'Thay đổi ảnh 3 thành công');
        }
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
    public function edit($id)
    {
        $event =  Event::find($id);
        return view('admin.event.form', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();
        $event = Event::find($id);
        $event->title = $data['title'];
        $event->slug = $data['slug'];
        $event->title_order = $data['title_order'];

        $start_date = Carbon::createFromFormat('Y-m-d', $request->input('start_date'))->format('Y-m-d');
        $event->start_date = $start_date;

        $end_date = Carbon::createFromFormat('Y-m-d', $request->input('end_date'))->format('Y-m-d');
        $event->end_date = $end_date;

        $event->price = $data['price'];
        $event->status = $data['status'];

        $event->description1 = $data['description1'];
        $event->description2 = $data['description2'];
        $event->description3 = $data['description3'];
        $get_image = $request->file('image');

        if ($get_image) {
            $old_image_path = public_path('uploads/event/' . $event->image);
            if (file_exists($old_image_path) && is_file($old_image_path)) {
                unlink($old_image_path);
            }

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/event/'), $new_image);
            $event->image = $new_image;
        }
        $get_image2 = $request->file('image2');
        $get_image3 = $request->file('image3');

        if ($get_image2) {
            $old_image2_path = public_path('uploads/event2/' . $event->image2);

            if (file_exists($old_image2_path) && is_file($old_image2_path)) {
                unlink($old_image2_path);
            }

            $name_image2 = $get_image2->getClientOriginalName();
            $new_image2 = pathinfo($name_image2, PATHINFO_FILENAME) . '_' . uniqid() . '.' . $get_image2->getClientOriginalExtension();
            $get_image2->move('uploads/event2/', $new_image2);
            $event->image2 = $new_image2;
        }

        if ($get_image3) {
            $old_image3_path = public_path('uploads/event3/' . $event->image3);

            if (file_exists($old_image3_path) && is_file($old_image3_path)) {
                unlink($old_image3_path);
            }

            $name_image3 = $get_image3->getClientOriginalName();
            $new_image3 = pathinfo($name_image3, PATHINFO_FILENAME) . '_' . uniqid() . '.' . $get_image3->getClientOriginalExtension();
            $get_image3->move('uploads/event3/', $new_image3);
            $event->image3 = $new_image3;
        }

        $event->save();
        toastr()->success('Thành công', 'Cập nhật thành công');
        return redirect()->route('event.index');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        //Xóa ảnh
        if (!empty($event->image) && is_file('uploads/event/' . $event->image)) {
            unlink('uploads/event/' . $event->image);
        }
        //Xóa ảnh 1
        if (!empty($event->image2) && is_file('uploads/event2/' . $event->image2)) {
            unlink('uploads/event2/' . $event->image2);
        }
        //Xóa ảnh 2
        if (!empty($event->image3) && is_file('uploads/event2/' . $event->image3)) {
            unlink('uploads/event3/' . $event->image3);
        }
        //Xóa sự kiện
        $event->delete();
        toastr()->success('Thành công', 'Xóa thành công');
        return redirect()->back();
    }
}
