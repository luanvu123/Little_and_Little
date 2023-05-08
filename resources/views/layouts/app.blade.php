<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @if (Auth::id())
                <div class="container">
                    @include('layouts.navbar')
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    let table = new DataTable('#tableevent');
    $(document).ready(function() {
        $('#tableevent').DataTable();
    });

    function ChangeToSlug() {

        var slug;

        //Lấy text từ thẻ input title
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '-');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('convert_slug').value = slug;
    }
</script>

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function() {
        $('#start_date, #end_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
</script>

<script type="text/javascript">
    $('.trangthai_choose').change(function() {

        var trangthai_val = $(this).val();
        var id = $(this).attr('id');
        $.ajax({
            url: "{{ route('trangthai-choose') }}",
            method: "GET",
            data: {
                trangthai_val: trangthai_val,
                id: id
            },
            success: function(data) {
                alert('Thay đổi trạng thái thành công!');
            }
        });
    })
</script>

<script type="text/javascript">
    $(document).on('change', '.file_image', function() {

        // Lấy ID của sự kiện
        var event_id = $(this).data('event_id');
        // Lấy tập tin hình ảnh được chọn
        var files = $("#file-" + event_id)[0].files;
        var image = document.getElementById("file-" + event_id).files[0];
        // Khởi tạo đối tượng form data để gửi qua ajax
        var form_data = new FormData();

        // Thêm hình ảnh và ID sự kiện vào form data
        form_data.append("file", document.getElementById("file-" + event_id).files[0]);
        form_data.append("id", event_id);

        // Gọi ajax để update hình ảnh cho sự kiện
        $.ajax({
            url: "{{ route('update-image-event-ajax') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,

            contentType: false,
            cache: false,
            processData: false,

            success: function(response) {
                // Cập nhật hình ảnh mới trên trang web
                $('#success_image').html(
                    '<span class="text-success">Thay đổi ảnh thành công</span>');
                $('img[data-event_id="' + event_id + '"]').attr('src',
                    '{{ asset('uploads/event') }}/' + response);
            }
        });
    });



    $(document).on('change', '.file_image2', function() {

        var event_id = $(this).data('event_id');
        var files = $("#file2-" + event_id)[0].files;
        var image = document.getElementById("file2-" + event_id).files[0];
        var form_data = new FormData();

        form_data.append("file2", document.getElementById("file2-" + event_id).files[0]);
        form_data.append("id", event_id);

        $.ajax({
            url: "{{ route('update-image2-event-ajax') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,

            contentType: false,
            cache: false,
            processData: false,

            success: function(response) {
                // Update the image on the web page
                $('#success_image2').html(
                    '<span class="text-success">Thay đổi ảnh thành công</span>');
                $('img[data-event_id="' + event_id + '"]').attr('src',
                    '{{ asset('uploads/event2') }}/' + response);
            }
        });
    });


    $(document).on('change', '.file_image3', function() {

        var event_id = $(this).data('event_id');
        var files = $("#file3-" + event_id)[0].files;
        var image = document.getElementById("file3-" + event_id).files[0];
        var form_data = new FormData();

        form_data.append("file3", document.getElementById("file3-" + event_id).files[0]);
        form_data.append("id", event_id);

        $.ajax({
            url: "{{ route('update-image3-event-ajax') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,

            contentType: false,
            cache: false,
            processData: false,

            success: function(response) {
                // Update the image on the web page
                $('#success_image3').html(
                    '<span class="text-success">Thay đổi ảnh thành công</span>');
                $('img[data-event_id="' + event_id + '"]').attr('src',
                    '{{ asset('uploads/event3') }}/' + response);
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.delete-image-btn').click(function() {
            var event_id = $(this).data('event_id');
            $.ajax({
                url: "{{ route('delete-image-event-ajax') }}",
                method: "POST",
                data: {
                    event_id: event_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        $('#file-' + event_id).val('');
                        $('#success_image').text('Xóa ảnh thành công');
                        $('#success_image').css('color', 'green');
                    } else {
                        $('#success_image').text('Xóa ảnh thất bại');
                        $('#success_image').css('color', 'red');
                    }
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete-image2-btn').click(function() {
            var event_id = $(this).data('event_id');
            $.ajax({
                url: "{{ route('delete-image2-event-ajax') }}",
                method: "POST",
                data: {
                    event_id: event_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        $('#file2-' + event_id).val('');
                        $('#success_image2').text('Xóa ảnh thành công');
                        $('#success_image2').css('color', 'green');
                    } else {
                        $('#success_image2').text('Xóa ảnh thất bại');
                        $('#success_image2').css('color', 'red');
                    }
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete-image3-btn').click(function() {
            var event_id = $(this).data('event_id');
            $.ajax({
                url: "{{ route('delete-image3-event-ajax') }}",
                method: "POST",
                data: {
                    event_id: event_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        $('#file3-' + event_id).val('');
                        $('#success_image3').text('Xóa ảnh thành công');
                        $('#success_image3').css('color', 'green');
                    } else {
                        $('#success_image3').text('Xóa ảnh thất bại');
                        $('#success_image3').css('color', 'red');
                    }
                }
            });
        });
    });
</script>


</html>
