@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản Lý Thông tin</div>
                     @if ($errors->any())
                     <div class="alert alert-danger">
                       <ul>
                          @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
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
                        {!! Form::open(['route'=>['info.update',$info->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Tiêu đề website', []) !!}
                            {!! Form::text('text1', isset($info) ? $info->text1 : '', ['class'=>'form-control','placeholder'=>'...','required'=>'required']) !!}
                        </div>
                           <div class="form-group">
                            {!! Form::label('Image', 'Hình ảnh logo', []) !!}
                            {!! Form::file('logo', ['class'=>'form-control-file']) !!}
                            @if(isset($info))
                              <img width="150" src="{{asset('uploads/logo/'.$info->logo)}}">
                            @endif
                        </div>
                          <div class="form-group">
                            {!! Form::label('title', 'Tiêu đề website 2', []) !!}
                            {!! Form::text('text2', isset($info) ? $info->text2 : '', ['class'=>'form-control','placeholder'=>'...','required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả Website', []) !!}
                            {!! Form::textarea('text3', isset($info) ? $info->text3 : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description','required'=>'required']) !!}
                        </div>
                           <div class="form-group">
                            {!! Form::label('description', 'Mô tả Website', []) !!}
                            {!! Form::textarea('text4', isset($info) ? $info->text4 : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description','required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả Website', []) !!}
                            {!! Form::textarea('text5', isset($info) ? $info->text5 : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description','required'=>'required']) !!}
                        </div>
                         <div class="form-group">
                            {!! Form::label('description', 'Mô tả Website', []) !!}
                            {!! Form::textarea('text6', isset($info) ? $info->text6 : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description','required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả Website', []) !!}
                            {!! Form::textarea('text7', isset($info) ? $info->text7 : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description','required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả Website', []) !!}
                            {!! Form::textarea('text8', isset($info) ? $info->text8 : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description','required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả Website', []) !!}
                            {!! Form::textarea('text9', isset($info) ? $info->text9 : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description','required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả Website', []) !!}
                            {!! Form::textarea('text10', isset($info) ? $info->text10 : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description','required'=>'required']) !!}
                        </div>

                          <div class="form-group">
                            {!! Form::label('Text6', 'Địa chỉ', []) !!}
                            {!! Form::text('address', isset($info) ? $info->address : '', ['class'=>'form-control','placeholder'=>'...','required'=>'required']) !!}
                        </div>
                         <div class="form-group">
                            {!! Form::label('Text6', 'Email', []) !!}
                            {!! Form::text('email', isset($info) ? $info->email : '', ['class'=>'form-control','placeholder'=>'...','required'=>'required']) !!}
                        </div>
                         <div class="form-group">
                            {!! Form::label('Text6', 'Số điện thoại', []) !!}
                            {!! Form::text('phone', isset($info) ? $info->phone : '', ['class'=>'form-control','placeholder'=>'...','required'=>'required']) !!}
                        </div>
                          <div class="form-group">
                            {!! Form::label('Text6', 'Số điện thoại navbar', []) !!}
                            {!! Form::text('phonenav', isset($info) ? $info->phonenav : '', ['class'=>'form-control','placeholder'=>'...','required'=>'required']) !!}
                        </div>
                            {!! Form::submit('Cập Nhật Thông tin', ['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
