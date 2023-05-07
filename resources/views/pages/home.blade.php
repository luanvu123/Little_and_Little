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

            <div class="m-sen">ĐẦM SEN</div>
            <div class="park">PARK</div>
            <div class="frame1">
                <img class="group-icon" alt="" src="{{ asset('assets/group.svg') }}" />

                <img class="group-icon1" alt="" src="{{ asset('assets/group1.svg') }}" />

                <img class="vector-icon" alt="" src="{{ asset('assets/vector.svg') }}" />

                <div class="frame-group">
                    <div class="gi-gia-nh-wrapper">
                        <div class="gi-gia-nh">Gói gia đình</div>
                    </div>
                    <div class="ngy-s-dng-wrapper">
                        <div class="gi-gia-nh">Ngày sử dụng</div>
                    </div>
                    <div class="h-v-tn-wrapper">
                        <div class="h-v-tn">Họ và tên</div>
                    </div>
                    <div class="s-in-thoi-wrapper">
                        <div class="h-v-tn">Số điện thoại</div>
                    </div>
                    <div class="a-ch-email-wrapper">
                        <div class="h-v-tn">Địa chỉ email</div>
                    </div>
                    <img class="frame-icon" alt="" src="{{ asset('assets/frame.svg') }}" />

                    <img class="frame-icon1" alt="" src="{{ asset('assets/frame1.svg') }}" id="frame1" />

                    <div class="s-lng-v-wrapper">
                        <div class="h-v-tn">Số lượng vé</div>
                    </div>
                </div>
                <div class="frame2">
                    <img class="group-icon2" alt="" src="{{ asset('assets/group2.svg') }}" id="group2" />

                    <div class="t-v">Đặt vé</div>
                </div>
                <div class="lorem-ipsum-dolor-container">
                    <p class="lorem-ipsum-dolor">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Suspendisse ac mollis justo. Etiam volutpat tellus quis risus
                        volutpat, ut posuere ex facilisis.
                    </p>
                    <p class="lorem-ipsum-dolor">&nbsp;</p>
                    <p class="lorem-ipsum-dolor">
                        Suspendisse iaculis libero lobortis condimentum gravida. Aenean
                        auctor iaculis risus, lobortis molestie lectus consequat a.
                    </p>
                </div>
                <div class="frame-container">
                    <img class="frame-icon2" alt="" src="{{ asset('assets/frame2.svg') }}" />

                    <b class="lorem-ipsum-dolor1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </b>
                </div>
                <div class="frame-div">
                    <img class="frame-icon2" alt="" src="{{ asset('assets/frame3.svg') }}" />

                    <b class="lorem-ipsum-dolor1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </b>
                </div>
                <div class="frame-parent1">
                    <img class="frame-icon2" alt="" src="{{ asset('assets/frame3.svg') }}" />

                    <b class="lorem-ipsum-dolor1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </b>
                </div>
                <div class="frame-parent2">
                    <img class="frame-icon2" alt="" src="{{ asset('assets/frame4.svg') }}" />
                    <b class="lorem-ipsum-dolor1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
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

                    <b class="sample-text">0123456789</b>
                </div>
            </div>
            <img class="little-little-logo-ngang-1" alt=""
                src="{{ asset('assets/little--little-logo-ngang-1@2x.png') }}" />
        </div>
    </div>

    <div id="calendarContainer" class="popup-overlay" style="display: none">
        <div class="calendar">
            <div class="month-selector">
                <div class="arrows">
                    <img class="previous-icon" alt="" src="{{ asset('assets/previous.svg') }}" />

                    <b class="thng-5-2021">Tháng 5, 2021</b>
                    <img class="previous-icon" alt="" src="{{ asset('assets/next.svg') }}" />
                </div>
            </div>
            <div class="calendar-events">
                <div class="weekdays">
                    <b class="cn">CN</b>
                    <b class="t2">T2</b>
                    <b class="t3">T3</b>
                    <b class="t4">T4</b>
                    <b class="t5">T5</b>
                    <b class="t6">T6</b>
                    <b class="t7">T7</b>
                </div>
                <div class="week-01">
                    <div class="div">1</div>
                    <div class="div1">2</div>
                    <div class="div2">3</div>
                    <div class="div3">1</div>
                    <div class="div4">2</div>
                    <div class="div5">3</div>
                    <div class="div6">4</div>
                </div>
                <div class="week-02">
                    <div class="div7">5</div>
                    <div class="div8">6</div>
                    <div class="div9">7</div>
                    <img class="current-day-icon" alt="" src="{{ asset('assets/current-day.svg') }}" />

                    <div class="div10">8</div>
                    <div class="div11">9</div>
                    <div class="div12">10</div>
                    <div class="div13">11</div>
                </div>
                <div class="week-03">
                    <div class="div3">12</div>
                    <div class="div15">13</div>
                    <div class="div16">14</div>
                    <div class="div17">15</div>
                    <div class="div18">16</div>
                    <div class="div19">17</div>
                    <div class="div20">18</div>
                </div>
                <div class="week-04">
                    <div class="div3">19</div>
                    <div class="div22">20</div>
                    <div class="div23">21</div>
                    <div class="div24">22</div>
                    <div class="div18">23</div>
                    <div class="div26">24</div>
                    <div class="div20">25</div>
                </div>
                <div class="week-05">
                    <div class="div3">26</div>
                    <div class="div15">27</div>
                    <div class="div30">28</div>
                    <div class="div17">29</div>
                    <div class="div32">30</div>
                    <div class="div33">31</div>
                    <div class="div34">30</div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var frame1 = document.getElementById("frame1");
        if (frame1) {
            frame1.addEventListener("click", function() {
                var popup = document.getElementById("calendarContainer");
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
        var group2 = document.getElementById("group2");
        if (group2) {
            group2.addEventListener("click", function(e) {
                window.location.href = "{{route('payment')}}";
            });
        }
    </script>
@endsection
