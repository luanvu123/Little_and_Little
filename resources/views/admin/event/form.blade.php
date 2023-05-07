@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản Lý Sự kiện</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($event))
                            {!! Form::open(['route' => 'event.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['event.update', $event->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tên sự kiện', []) !!}
                            {!! Form::text('title', isset($event) ? $event->title : '', [
                                'class' => 'form-control',
                                'placeholder' => '...',
                                'id' => 'slug',
                                'onkeyup' => 'ChangeToSlug()',
                                'required' => 'required',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Đường dẫn', []) !!}
                            {!! Form::text('slug', isset($event) ? $event->slug : '', [
                                'class' => 'form-control',
                                'placeholder' => '...',
                                'id' => 'convert_slug',
                                'required' => 'required',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('title_order', 'Tên khác', []) !!}
                            {!! Form::text('title_order', isset($event) ? $event->title_order : '', [
                                'class' => 'form-control',
                                'placeholder' => '...',
                                'required' => 'required',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('start_date', 'Từ ngày', []) !!}
                            {!! Form::text('start_date', isset($event) ? $event->start_date : '', [
                                'class' => 'form-control',
                                'placeholder' => '...',
                                'id' => 'start_date',
                                'required' => 'required',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('end_date', 'Đến ngày', []) !!}
                            {!! Form::text('end_date', isset($event) ? $event->end_date : '', [
                                'class' => 'form-control',
                                'placeholder' => '...',
                                'id' => 'end_date',
                                'required' => 'required',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('price', 'Giá', []) !!}
                            {!! Form::text('price', isset($event) ? $event->price : '', [
                                'class' => 'form-control',
                                'placeholder' => '...',
                                'required' => 'required',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($event) ? $event->status : '', [
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Image', 'Hình ảnh', []) !!}
                            {!! Form::file('image', ['class' => 'form-control-file']) !!}
                            @if (isset($event))
                                <img width="150" src="{{ asset('uploads/event/' . $event->image) }}">
                                <style type="text/css">
                                    input[type=file] {
                                        width: 90px;
                                        color: transparent;
                                    }
                                </style>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description1', 'Mô tả sự kiện', []) !!}
                            {!! Form::textarea('description1', isset($event) ? $event->description1 : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description1','required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Image 2', 'Hình ảnh chi tiết(nếu có)', []) !!}
                            {!! Form::file('image2', ['class' => 'form-control-file']) !!}
                            @if (isset($event) && $event->image2)
                                <img width="150" src="{{ asset('uploads/event2/' . $event->image2) }}">
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả sự kiện 2', []) !!}
                            {!! Form::textarea('description2', isset($event) ? $event->description2 : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description2','required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả sự kiện 3', []) !!}
                            {!! Form::textarea('description3', isset($event) ? $event->description3 : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description3','required'=>'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Image 3', 'Hình ảnh sự kiện(nếu có)', []) !!}
                            {!! Form::file('image3', ['class' => 'form-control-file']) !!}
                            @if (isset($event) && $event->image3)
                                <img width="150" src="{{ asset('uploads/event3/' . $event->image3) }}">
                            @endif
                        </div>

                        @if (!isset($event))
                            {!! Form::submit('Thêm Sự Kiện', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Sự Kiện', ['class' => 'btn btn-success']) !!}
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
