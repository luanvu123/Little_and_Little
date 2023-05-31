@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản Lý Gói</div>
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
                    @if(!isset($package))
                        {!! Form::open(['route'=>'package.store','method'=>'POST']) !!}
                    @else
                        {!! Form::open(['route'=>['package.update',$package->id],'method'=>'PUT']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('name_package', 'Tên gói', []) !!}
                            {!! Form::text('name_package', isset($package) ? $package->name_package : '', ['class'=>'form-control','placeholder'=>'...','required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('price_package', 'Giá gói', []) !!}
                            {!! Form::number('price_package', isset($package) ? $package->price_package : '', ['class'=>'form-control','placeholder'=>'...','required'=>'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', []) !!}
                            {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không hiển thị'], isset($package) ? $package->status : '', ['class'=>'form-control']) !!}
                        </div>
                        @if(!isset($package))
                            {!! Form::submit('Thêm Gói', ['class'=>'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Gói', ['class'=>'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                    </div>
                </div>


                <table class="table" id="tableevent">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên gói</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $cate)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cate->name_package }}</td>
                                <td>{{ number_format($cate->price_package, 0, ',', '.') }} VNĐ</td>
                                 <td>
                                        <select id="{{ $cate->id }}"class="goi_choose">
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
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['package.destroy', $cate->id],
                                        'onsubmit' => 'return confirm("Bạn có chắc muốn xóa?")',
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('package.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
