@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('event.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm Sự kiện</a>
                <div class="table-responsive">
                    <table class="table" id="tableevent">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên event</th>
                                <th scope="col">Tên khác</th>
                                <th scope="col">Ngày bắt đầu</th>
                                <th scope="col">Ngày kết thúc</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Ảnh nhỏ</th>
                                <th scope="col">Ảnh nhỏ 2</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody class="order_position">
                            @foreach ($list as $key => $cate)
                                <tr id="{{ $cate->id }}">
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $cate->title }}</td>
                                    <td>{{ $cate->title_order }}</td>
                                    <td>{{ $cate->start_date }}</td>
                                    <td>{{ $cate->end_date }}</td>
                                    <td>{{ number_format($cate->price, 0, ',', '.') }} VNĐ</td>
                                    <td>
                                        <select id="{{ $cate->id }}"class="trangthai_choose">
                                            @if ($cate->status == 0)
                                                <option value="1">Hiển thị</option>
                                                <option selected value="0">Không</option>
                                            @else
                                                <option selected value="1">Hiển thị</option>
                                                <option value="0">Không</option>
                                            @endif
                                        </select>

                                    </td>
                                    <td>
                                        <img width="100" src="{{ asset('uploads/event/' . $cate->image) }}">
                                        <input type="file" data-event_id="{{ $cate->id }}"
                                            id="file-{{ $cate->id }}" class="form-control-file file_image"
                                            accept="image/*">
                                        <span id="success_image"></span>
                                        <style type="text/css">
                                            input[type=file] {
                                                width: 90px;
                                                color: transparent;
                                            }
                                        </style>
                                        <button class="delete-image-btn" data-event_id="{{ $cate->id }}">Xóa
                                            ảnh <i class="fa-solid fa-trash-can" style="color: #ec0a0a;"></i></button>

                                    </td>


                                    <td>
                                        <img width="100" src="{{ asset('uploads/event2/' . $cate->image2) }}">
                                        <input type="file" data-event_id="{{ $cate->id }}"
                                            id="file2-{{ $cate->id }}" class="form-control-file file_image2"
                                            accept="image2/*">
                                        <span id="success_image2"></span>
                                        <style type="text/css">
                                            input[type=file] {
                                                width: 90px;
                                                color: transparent;
                                            }
                                        </style>
                                        <button class="delete-image2-btn" data-event_id="{{ $cate->id }}">Xóa
                                            ảnh <i class="fa-solid fa-trash-can" style="color: #ec0a0a;"></i></button>
                                    </td>
                                    <td>
                                        <img width="100" src="{{ asset('uploads/event3/' . $cate->image3) }}">
                                        <input type="file" data-event_id="{{ $cate->id }}"
                                            id="file3-{{ $cate->id }}" class="form-control-file file_image3"
                                            accept="image3/*">
                                        <span id="success_image3"></span>
                                        <style type="text/css">
                                            input[type=file] {
                                                width: 90px;
                                                color: transparent;
                                            }
                                        </style>
                                        <button class="delete-image3-btn" data-event_id="{{ $cate->id }}">Xóa
                                            ảnh <i class="fa-solid fa-trash-can" style="color: #ec0a0a;"></i></button>
                                    </td>
                                    <td>{{ $cate->ngaytao }}</td>
                                    <td>{{ $cate->ngaycapnhat }}</td>
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['event.destroy', $cate->id],
                                            'onsubmit' => 'return confirm("Bạn có chắc muốn xóa?")',
                                        ]) !!}
                                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        <a href="{{ route('event.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection
