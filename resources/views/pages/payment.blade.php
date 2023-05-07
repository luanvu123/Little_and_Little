    @extends('layout')
@section('content')
    <div class="thanh-ton">
      <img class="frame-icon11" alt="" src="{{ asset('assets/frame10.svg') }}" />

      <div class="frame8">
        <img class="group-icon19" alt="" src="{{ asset('assets/group12.svg') }}" />

        <img class="group-icon20" alt="" src="{{ asset('assets//group13.svg') }}" />

        <div class="frame9" id="frameContainer">
          <img class="group-icon21" alt="" src="{{ asset('assets/group2.svg') }}" />

          <div class="thanh-ton1">Thanh toán</div>
        </div>
        <div class="s-tin-thanh-ton">
          <b class="s-tin-thanh">Số tiền thanh toán</b>
          <div class="vn-wrapper">
            <div class="nguyen-thi-ngoc">360.000 vnđ</div>
          </div>
        </div>
        <div class="s-tin-thanh-ton-parent">
          <div class="s-tin-thanh-ton1">
            <b class="s-tin-thanh">Số thẻ</b>
            <div class="wrapper">
              <div class="nguyen-thi-ngoc">3641 4513 4369 7895</div>
            </div>
          </div>
          <div class="s-tin-thanh-ton1">
            <b class="s-tin-thanh">Họ tên chủ thẻ</b>
            <div class="wrapper">
              <div class="nguyen-thi-ngoc">NGUYEN THI NGOC TUYEN</div>
            </div>
          </div>
          <div class="s-tin-thanh-ton1">
            <b class="s-tin-thanh">Ngày hết hạn</b>
            <div class="frame-parent13">
              <div class="container">
                <div class="nguyen-thi-ngoc">05/2025</div>
              </div>
              <img
                class="frame-icon12"
                alt=""
                src="{{ asset('assets/frame1.svg') }}"
                id="frame1"
              />
            </div>
          </div>
          <div class="s-tin-thanh-ton4">
            <b class="s-tin-thanh">CVV/CVC</b>
            <div class="wrapper1">
              <div class="nguyen-thi-ngoc">***</div>
            </div>
          </div>
        </div>
        <div class="s-lng-v1">
          <b class="s-tin-thanh">Số lượng vé</b>
          <div class="frame-parent14">
            <div class="wrapper2">
              <div class="nguyen-thi-ngoc">4</div>
            </div>
            <div class="v">vé</div>
          </div>
        </div>
        <div class="ngy-s-dng5">
          <b class="s-tin-thanh">Ngày sử dụng</b>
          <div class="wrapper3">
            <div class="nguyen-thi-ngoc">15/08/2021</div>
          </div>
        </div>
        <div class="thng-tin-lin-h">
          <b class="thng-tin-lin">Thông tin liên hệ</b>
          <div class="nguyn-th-ngc-tuyn-wrapper">
            <div class="nguyen-thi-ngoc">Nguyễn Thị Ngọc Tuyền</div>
          </div>
        </div>
        <div class="in-thoi">
          <b class="s-tin-thanh">Điện thoại</b>
          <div class="vn-wrapper">
            <div class="nguyen-thi-ngoc">0123456789</div>
          </div>
        </div>
        <div class="email">
          <b class="s-tin-thanh">Email</b>
          <div class="nguyn-th-ngc-tuyn-wrapper">
            <div class="nguyen-thi-ngoc">tuyen.nguyen@alta.com.vn</div>
          </div>
        </div>
        <img class="vector-icon8" alt="" src="{{ asset('assets/vector8.svg') }}" />
      </div>
      <div class="thanh-ton2">Thanh toán</div>
      <div class="group-parent8">
        <img class="group-icon21" alt="" src="{{ asset('assets/group14.svg') }}" />

        <div class="v-cng-">VÉ CỔNG - VÉ GIA ĐÌNH</div>
      </div>
      <div class="group-parent9">
        <img class="group-icon21" alt="" src="{{ asset('assets/group14.svg') }}" />

        <div class="thng-tin-thanh">THÔNG TIN THANH TOÁN</div>
      </div>
      <div class="navigation4">
        <img class="navigation-child2" alt="" src="{{ asset('assets/vector-2.svg') }}" />

        <div class="frame-parent15">
          <div class="tags-parent2">
            <div class="tags12" id="tagsContainer">
              <b class="sample-text12">Trang chủ</b>
            </div>
            <div class="tags12" id="tagsContainer1">
              <b class="sample-text12">Sự kiện</b>
            </div>
            <div class="tags12" id="tagsContainer2">
              <b class="sample-text12">Liên hệ</b>
            </div>
          </div>
          <div class="group-parent10">
            <img class="group-icon24" alt="" src="{{ asset('assets/group4.svg') }}" />

            <b class="sample-text12">0123456789</b>
          </div>
        </div>
        <img
          class="little-little-logo-ngang-14"
          alt=""
          src="{{ asset('assets/little--little-logo-ngang-1@2x.png') }}"
        />
      </div>
      <img
        class="trini-arnold-votay1-2-icon"
        alt=""
        src="{{ asset('assets/trini-arnold-votay1-2@2x.png') }}"
      />
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
            <img
              class="current-day-icon"
              alt=""
              src="{{ asset('assets/current-day.svg') }}"
            />

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
      var frameContainer = document.getElementById("frameContainer");
      if (frameContainer) {
        frameContainer.addEventListener("click", function (e) {
          window.location.href = "{{route('success')}}";
        });
      }

      var frame1 = document.getElementById("frame1");
      if (frame1) {
        frame1.addEventListener("click", function () {
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
            function (e) {
              if (e.target === popup && popup.hasAttribute("closable")) {
                popupStyle.display = "none";
              }
            };
          popup.addEventListener("click", onClick);
        });
      }
      </script>
@endsection
