@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table" id="tableevent">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã vé </th>
                                <th scope="col">Phương thức </th>
                                <th scope="col">Số lượng vé </th>
                                <th scope="col">Mã qr </th>
                                <th scope="col">Ngày sử dụng</th>
                                <th scope="col">số tiền </th>
                                <th scope="col">Tên </th>
                                <th scope="col">Điện thoại </th>
                                <th scope="col">Email </th>
                                <th scope="col">Tên gói </th>
                                <th scope="col">Ngày đặt </th>
                                <th scope="col">Quản lý</th>
                                <th scope="col">Mới nhất</th>

                            </tr>
                        </thead>
                        <tbody class="order_position">
                            @foreach ($list as $key => $cate)
                                <tr id="{{ $cate->id }}">
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $cate->order_id }}</td>
                                    <td>{{ $cate->order_info }}</td>
                                    <td>{{ $cate->number }}</td>
                                    <td><img src="{{ asset($cate->qr_code) }}" alt="QR Code" style="width: 70px" /></td>
                                    <td>{{ $cate->date }}</td>
                                    <td>{{ number_format($cate->amount, 0, ',', '.') }} VNĐ</td>
                                    <td>{{ $cate->fullname }}</td>
                                    <td>{{ $cate->phone }}</td>
                                    <td>{{ $cate->email }}</td>
                                    <td>
                                       <span class="label" style="background-color: {{ $colorMap[$cate->package_name] }}">{{ $cate->package_name }}</span>
                                    </td>
                                    <td>{{ $cate->created_at }}</td>
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['order.destroy', $cate->id],
                                            'onsubmit' => 'return confirm("Bạn có chắc muốn xóa?")',
                                        ]) !!}
                                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        @if ($cate->created_at > \Carbon\Carbon::now()->subHour())
                                            <span class="label label-primary pull-right">new</span>
                                        @endif
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
