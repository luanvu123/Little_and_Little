@extends('layout')
@section('content')
    <div class="trang-ch">
        <div class="frame">
            <img class="bg-icon" alt="" src="{{ asset('assets/bg.svg') }}" />

            <img class="image-2-icon" alt="" src="{{ asset('assets/image-2@2x.png') }}">

            <img class="converted-02-1-icon" alt="" src="{{ asset('assets/18451-converted02-1@2x.png') }}" />

            <img class="render-fix-hair-1" alt="" src="{{ asset('assets/render-fix-hair-1@2x.png') }}" />

            <img class="converted-03-1-icon" alt="" src="{{ asset('assets/18451-converted03-1@2x.png') }}" />

            <img class="converted-03-2-icon" alt="" src="{{ asset('assets/18451-converted03-2@2x.png') }}" />

            <img class="converted-04-1-icon" alt="" src="{{ asset('assets/18451-converted04-1@2x.png') }}" />

            <img class="converted-05-1-icon" alt="" src="{{ asset('assets/18451-converted05-1@2x.png') }}" />

            <div class="m-sen">{{ $info->text1 }}</div>
            <div class="park">{{ $info->text2 }}</div>
            <div class="frame1">
                <img class="group-icon" alt="" src="{{ asset('assets/group.svg') }}" />

                <img class="group-icon1" alt="" src="{{ asset('assets/group1.svg') }}" />

                <img class="vector-icon" alt="" src="{{ asset('assets/vector.svg') }}" />



                <form method="post" action="{{ route('submitBookingForm') }}">
                    @csrf
                    <div class="frame-group">
                        <select class="gi-gia-nh-wrapper" name="package" id="package" required>
                            <div class="gi-gia-nh">
                                @foreach ($packages as $package)
                                    <option value="{{ $package->name_package }}">{{ $package->name_package }}</option>
                                @endforeach
                            </div>
                        </select>
                        <img class="frame-icon" alt="" src="{{ asset('assets/frame.svg') }}" />
                        <input class="ngy-s-dng-wrapper" type="date" name="date" id="date" required
                            placeholder="yyyy-mm-dd" min="{{ date('Y-m-d') }}">
                        <input class="h-v-tn-wrapper" type="text" name="fullname" id="fullname" required
                            placeholder="Họ tên">
                        <input class="s-in-thoi-wrapper" type="tel" name="phone" id="phone" pattern="[0-9]{10,11}"
                            required placeholder="Số điện thoại">
                        <input class="a-ch-email-wrapper" type="email" name="email" id="email" required
                            placeholder="Email">
                        <img class="frame-icon1" alt="" src="{{ asset('assets/frame1.svg') }}" id="frame1" />
                        <input class="s-lng-v-wrapper" type="number" name="number" id="number" min="1"
                            max="10" required placeholder="Số lượng vé">
                    </div>
                    <button type="submit" id="group2">
                        <div class="frame2">

                            <img class="group-icon2" alt="" src="{{ asset('assets/group2.svg') }}" />

                            <div class="t-v">Đặt vé</div>
                        </div>
                    </button>

                </form>











                <div class="lorem-ipsum-dolor-container">
                    <p class="lorem-ipsum-dolor">
                        {{ $info->text3 }}
                    </p>
                    <p class="lorem-ipsum-dolor">
                        {{ $info->text4 }}
                    </p>
                    <p class="lorem-ipsum-dolor">
                        {{ $info->text5 }}
                    </p>
                </div>
                <div class="frame-container">
                    <img class="frame-icon2" alt="" src="{{ asset('assets/frame2.svg') }}" />

                    <b class="lorem-ipsum-dolor1"> {{ $info->text6 }}
                    </b>
                </div>
                <div class="frame-div">
                    <img class="frame-icon2" alt="" src="{{ asset('assets/frame3.svg') }}" />

                    <b class="lorem-ipsum-dolor1"> {{ $info->text7 }}
                    </b>
                </div>
                <div class="frame-parent1">
                    <img class="frame-icon2" alt="" src="{{ asset('assets/frame3.svg') }}" />

                    <b class="lorem-ipsum-dolor1"> {{ $info->text8 }}
                    </b>
                </div>
                <div class="frame-parent2">
                    <img class="frame-icon2" alt="" src="{{ asset('assets/frame4.svg') }}" />
                    <b class="lorem-ipsum-dolor1"> {{ $info->text9 }}
                    </b>
                </div>

            </div>
            <div class="group-parent">
                <img class="group-icon3" alt="" src="{{ asset('assets/group3.svg') }}" />

                <div class="v-ca-bn">VÉ CỦA BẠN</div>
            </div>
            <img class="converted-06-1-icon" alt="" src="{{ asset('assets/18451-converted06-1@2x.png') }}" />

            <img class="lisa-arnold-lay-do-f2-3-icon" alt=""
                src="{{ asset('assets/lisa-arnold-lay-do-f2-3@2x.png') }}" />
        </div>
        <div class="navigation">
            <img class="navigation-child" alt="" src="{{ asset('assets/vector-2.svg') }}" />

            <div class="group-div">
                <div class="tags-parent">
                    <div class="tags" id="tagsContainer">
                        <b class="sample-text">Trang chủ</b>
                    </div>
                    <div class="tags1" id="tagsContainer1">
                        <b class="sample-text">Sự kiện</b>
                    </div>
                    <div class="tags1" id="tagsContainer2">
                        <b class="sample-text">Liên hệ</b>
                    </div>
                </div>
                <div class="group-group">
                    <img class="group-icon4" alt="" src="{{ asset('assets/group4.svg') }}" />

                    <b class="sample-text">{{ $info->phonenav }}</b>
                </div>
            </div>
            <img class="little-little-logo-ngang-1" alt=""
                src="{{ asset('assets/little--little-logo-ngang-1@2x.png') }}" />
        </div>
    </div>


    <script>
        var frame1 = document.getElementById("frame1");
        if (frame1) {
            frame1.addEventListener("click", function() {
                var popup = document.getElementById("ngy-s-dng-wrappe");
                if (!popup) return;
                var popupStyle = popup.style;
                if (popupStyle) {
                    popupStyle.display = "flex";
                    popupStyle.zIndex = 100;
                    popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
                    popupStyle.alignItems = "center";
                    popupStyle.justifyContent = "center";
                }
                popup.setAttribute("closable", "");

                var onClick =
                    popup.onClick ||
                    function(e) {
                        if (e.target === popup && popup.hasAttribute("closable")) {
                            popupStyle.display = "none";
                        }
                    };
                popup.addEventListener("click", onClick);
            });
        }
    </script>
    <script>
        var bookTicket = document.getElementById("group2");
        if (bookTicket) {
            bookTicket.addEventListener("click", function(e) {
                if (!document.getElementById("package").value ||
                    !document.getElementById("date").value ||
                    !document.getElementById("fullname").value ||
                    !document.getElementById("phone").value ||
                    !document.getElementById("email").value ||
                    !document.getElementById("number").value
                ) {
                    e.preventDefault(); // Ngăn chặn sự kiện click mặc định
                    alert("Vui lòng nhập đầy đủ thông tin!");
                } else {
                    window.location.href = "{{ route('payment') }}";
                }
            });
        }
    </script>
@endsection
