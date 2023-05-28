    @extends('layout')
    @section('content')
        <div class="thanh-ton">
            <img class="frame-icon11" alt="" src="{{ asset('assets/frame10.svg') }}" />

            <div class="frame8">
                <img class="group-icon19" alt="" src="{{ asset('assets/group12.svg') }}" />

                <img class="group-icon20" alt="" src="{{ asset('assets//group13.svg') }}" />


                <div class="s-tin-thanh-ton">
                    <b class="s-tin-thanh">Số tiền thanh toán</b>
                    <div class="vn-wrapper">
                        <div class="nguyen-thi-ngoc">{{ number_format($totalPrice, 0, ',', '.') }} VNĐ</div>
                    </div>
                </div>
                <form method="post" action="{{ route('charge') }}">
                    @csrf
                    <input type="hidden" name="total_vnpay" value="{{ $totalPrice }}">

                    <button type="submit" id="pay-now-button" name="redirect">
                        <div class="frame9">

                            <img class="group-icon21" alt="" src="{{ asset('assets/group2.svg') }}" />

                            <div class="thanh-ton1">VnPay</div>
                        </div>
                    </button>


                </form>

                <form method="post" action="{{ route('charge-momo') }}">
                    @csrf



                    <input type="hidden" name="total_momo" value="{{ $totalPrice }}">

                     <button type="submit" id="pay-now-button" name="payUrl">
                    <div class="frame9-2">

                            <img class="group-icon21" alt="" src="{{ asset('assets/group2.svg') }}" />

                        <div class="thanh-ton1">Momo</div>
                    </div>
                      </button>


                </form>



                <div class="thng-tin-lin-h">
                    <b class="thng-tin-lin">Thông tin liên hệ</b>
                    <div class="nguyn-th-ngc-tuyn-wrapper">
                        <div class="nguyen-thi-ngoc">{{ $fullname }}</div>
                    </div>
                </div>

                <div class="in-thoi">
                    <b class="s-tin-thanh">Điện thoại</b>
                    <div class="vn-wrapper">
                        <div class="nguyen-thi-ngoc">{{ $phone }}</div>
                    </div>
                </div>

                <div class="email">
                    <b class="s-tin-thanh">Email</b>
                    <div class="nguyn-th-ngc-tuyn-wrapper">
                        <div class="nguyen-thi-ngoc">{{ $email }}</div>
                    </div>
                </div>
                <div class="s-lng-v1">
                    <b class="s-tin-thanh">Số lượng vé</b>
                    <div class="frame-parent14">
                        <div class="wrapper2">
                            <div class="nguyen-thi-ngoc">{{ $number }}</div>
                        </div>
                        <div class="v">vé</div>
                    </div>
                </div>

                <div class="ngy-s-dng5">
                    <b class="s-tin-thanh">Ngày sử dụng</b>
                    <div class="wrapper3">
                        <div class="nguyen-thi-ngoc">{{ $date }}</div>
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

                        <b class="sample-text12">{{ $info->phonenav }}</b>
                    </div>
                </div>
                <img class="little-little-logo-ngang-14" alt=""
                    src="{{ asset('assets/little--little-logo-ngang-1@2x.png') }}" />
            </div>
            <img class="trini-arnold-votay1-2-icon" alt=""
                src="{{ asset('assets/trini-arnold-votay1-2@2x.png') }}" />

        </div>


        <script>
            var frame1 = document.getElementById("frame1");
            if (frame1) {
                frame1.addEventListener("click", function() {
                    var popup = document.getElementById("ngy-s-dng5");
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
    @endsection
