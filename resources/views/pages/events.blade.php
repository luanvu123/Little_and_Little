@extends('layout')
@section('content')
    <div class="s-kin1">
        <div class="frame6">
            <div class="bg1">
                <img class="group-icon9" alt="" src="{{ asset('assets/group8.svg') }}" />

                <img class="frame-icon8" alt="" src="{{ asset('assets/frame7.svg') }}" />

                <img class="vector-icon1" alt="" src="{{ asset('assets/vector1.svg') }}" />

                <img class="vector-icon2" alt="" src="{{ asset('assets/vector2.svg') }}" />

                <img class="vector-icon3" alt="" src="{{ asset('assets/vector3.svg') }}" />

                <img class="vector-icon4" alt="" src="{{ asset('assets/vector4.svg') }}" />

                <img class="vector-icon5" alt="" src="{{ asset('assets/vector5.svg') }}" />

                <img class="vector-icon6" alt="" src="{{ asset('assets/vector6.svg') }}" />

                <img class="vector-icon7" alt="" src="{{ asset('assets/vector7.svg') }}" />
                <div class="s-kin-ni">Sự kiện nổi bật</div>


         
                <div class="s-kin-11">
                    @foreach ($events as $key => $event)
                        @include('pages.event_slider', ['event' => $event])
                    @endforeach
                </div>

                <img class="previous-btn-icon" alt="" src="{{ asset('assets/previous-btn.svg') }}" />
                <img class="next-btn-icon" alt="" src="{{ asset('assets/next-btn.svg') }}" />



            </div>
            <img class="frame-icon9" alt="" src="{{ asset('assets/frame8.svg') }}" />

            <img class="frame-icon10" alt="" src="{{ asset('assets/frame9.svg') }}" />

            <div class="render-11"></div>
        </div>
        <div class="navigation2">
            <img class="navigation-inner" alt="" src="{{ asset('assets/vector-2.svg') }}" />

            <div class="frame-parent11">
                <div class="tags-container">
                    <div class="tags6" id="tagsContainer">
                        <b class="s-kin-13">Trang chủ</b>
                    </div>
                    <div class="tags7">
                        <b class="s-kin-13">Sự kiện</b>
                    </div>
                    <div class="tags6" id="tagsContainer2">
                        <b class="s-kin-13">Liên hệ</b>
                    </div>
                </div>
                <div class="group-parent6">
                    <img class="group-icon14" alt="" src="{{ asset('assets/group4.svg') }}" />

                    <b class="s-kin-13">{{ $info->phonenav }}</b>
                </div>
            </div>
            <img class="little-little-logo-ngang-12" alt=""
                src="{{ asset('assets/little--little-logo-ngang-1@2x.png') }}" />
        </div>
    </div>

    <script>
        var btnXemChiTitList = document.querySelectorAll(".btn-xem-chi-tit");
        btnXemChiTitList.forEach(function(btnXemChiTit) {
            btnXemChiTit.addEventListener("click", function(e) {
                // Lấy giá trị slug của sự kiện từ data-attribute của button
                var slug = btnXemChiTit.getAttribute("data-slug");
                // Điều hướng đến trang chi tiết sự kiện với slug tương ứng
                window.location.href = "{{ route('detail', ['slug' => ':slug']) }}".replace(':slug', slug);

            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var slideCount = {{ $slideCount }};
            var eventCount = {{ $events->count() }};
            var slideWidth = $('.s-kin-12').outerWidth() + 25; // 25 là margin-right của các sự kiện
            var slideDuration = 5000; // thời gian chuyển đổi giữa các sự kiện (5 giây)

            function slideNext() {
                // tính toán vị trí của slider
                var slidePosition = -1 * slideCount * slideWidth;
                // chuyển đổi slider đến vị trí tiếp theo
                $('.s-kin-11').animate({
                    left: slidePosition
                }, 500, function() {
                    // nếu đây là slide cuối cùng, quay lại slide đầu tiên
                    if (slideCount >= eventCount - 4) {
                        slideCount = 0;
                        $('.s-kin-11').css('left', 0);
                    } else {
                        slideCount++;
                    }
                });
            }

            // chạy hàm slideNext sau một khoảng thời gian nhất định
            setInterval(slideNext, slideDuration);
        });
    </script>
    <script>
        $(document).ready(function() {
            // Lấy danh sách các phần tử trong slider
            var slides = $(".s-kin-11 .s-kin-12");

            // Thiết lập phần tử hiển thị đầu tiên
            var currentSlide = 0;
            slides.eq(currentSlide).addClass("current-slide");

            // Thêm sự kiện click vào nút next
            $(".next-btn-icon").click(function() {
                // Xác định phần tử tiếp theo
                var nextSlide = currentSlide + 1;
                if (nextSlide >= slides.length) {
                    nextSlide = 0;
                }

                // Chuyển slide
                slides.eq(currentSlide).removeClass("current-slide");
                slides.eq(nextSlide).addClass("current-slide");

                // Cập nhật vị trí của các phần tử
                slides.detach();
                slides.slice(nextSlide).appendTo(".s-kin-11");
                slides.slice(0, nextSlide).appendTo(".s-kin-11");

                // Cập nhật biến currentSlide
                currentSlide = nextSlide;
            });

            // Thêm sự kiện click vào nút previous
            // $(".previous-btn-icon").click(function() {
            //     // Xác định phần tử trước đó
            //     var prevSlide = currentSlide - 1;

            //     // Kiểm tra nếu đang ở slide đầu tiên thì quay lại slide cuối cùng
            //     if (prevSlide < 0) {
            //         prevSlide = slides.length - 1;
            //     }

            //     // Hiển thị lại 4 sự kiện trước đó
            //     $(".s-kin-12").hide();
            //     for (var i = prevSlide * 4; i < prevSlide * 4 + 4 && i < slides.length; i++) {
            //         $($(".s-kin-12")[i]).show();
            //     }

            //     // Cập nhật giá trị biến đếm slide hiện tại
            //     currentSlide = prevSlide;
            // });
            $(".previous-btn-icon").click(function() {
                // Xác định phần tử trước đó
                var prevSlide = currentSlide - 1;
                if (prevSlide < 0) {
                    prevSlide = slides.length - 1;
                }

                // Chuyển slide
                slides.eq(currentSlide).removeClass("current-slide");
                slides.eq(prevSlide).addClass("current-slide");

                // Cập nhật vị trí của các phần tử
                slides.detach();
                slides.slice(prevSlide).appendTo(".s-kin-11");
                slides.slice(0, prevSlide).appendTo(".s-kin-11");

                // Cập nhật biến currentSlide
                currentSlide = prevSlide;
            });
        });

    </script>




@endsection
