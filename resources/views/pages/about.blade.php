@extends('layout')
@section('content')
    <div class="contact-us">
        <div class="frame10">
            <img class="bg-icon2" alt="" src="{{ asset('assets/bg2.svg') }}" />

            <div class="lin-h">Liên hệ</div>
        </div>
        <div class="frame11">




            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="/contact">
                @csrf

                <img class="vector-icon12" alt="" src="{{ asset('assets/vector12.svg') }}" />
                <div class="group">
                    <img class="vector-icon9" alt="" src="{{ asset('assets/vector9.svg') }}" />

                    <img class="vector-icon10" alt="" src="{{ asset('assets/vector10.svg') }}" />

                    <img class="vector-icon11" alt="" src="{{ asset('assets/vector11.svg') }}" />
                </div>

                <textarea class="li-nhn-wrapper" id="message_contact" name="message_contact" rows="5"
                    placeholder="Enter your message"></textarea>
                <div class="frame-parent16">
                    <div class="frame-parent17">
                        <input type="text" class="tn-wrapper" id="name_contact" name="name_contact"
                            placeholder="Enter your name">
                        <input type="text" class="tn-wrapper" id="phone_contact" name="phone_contact"
                            placeholder="Enter your phone number">
                    </div>
                    <div class="frame-parent17">

                        <input type="email" class="email-wrapper" id="email_contact" name="email_contact"
                            placeholder="Enter your email">
                        <input type="text" class="a-ch-wrapper" id="address_contact" name="address_contact"
                            placeholder="Enter your address">

                    </div>
                </div>




                <button type="submit">
                    <div class="frame12" id="frameContainer1">
                        <img class="group-icon25" alt="" src="{{ asset('assets/group2.svg') }}" />

                        <div class="gi-lin-h-container1">

                            <span class="span2">Gửi liên hệ
                        </div>
                    </div>
                </button>
            </form>
            <div class="lorem-ipsum-dolor5">
                {{ $info->text10 }}
            </div>
            <div class="a-ch1">
                <img class="group-icon26" alt="" src="{{ asset('assets/group15.svg') }}" />

                <img class="adress-1-icon" alt="" src="{{ asset('assets/adress-1.svg') }}" />

                <div class="a-ch-parent">
                    <div class="a-ch2">Địa chỉ:</div>
                    <div class="u-c-phng">
                        {{ $info->address }}
                    </div>
                </div>
            </div>
            <div class="a-ch3">
                <img class="group-icon25" alt="" src="{{ asset('assets/group15.svg') }}" />

                <div class="email-parent">
                    <div class="email3">Email:</div>
                    <div class="investigateyour-sitecom">{{ $info->email }}</div>
                </div>
                <img class="mail-inbox-app-1-icon" alt="" src="{{ asset('assets/mailinboxapp-1.svg') }}" />
            </div>
            <div class="in-thoi2">
                <img class="group-icon25" alt="" src="{{ asset('assets/group15.svg') }}" />

                <div class="telephone-2-parent">
                    <img class="telephone-2-icon" alt="" src="{{ asset('assets/telephone-2.svg') }}" />

                    <div class="in-thoi-parent">
                        <div class="in-thoi3">Điện thoại</div>
                        <div class="investigateyour-sitecom">{{ $info->phone }}</div>
                    </div>
                </div>
            </div>
        </div>
        <img class="alex-ar-lay-do-shadow-1" alt="" src="{{ asset('assets/alex-ar-lay-do-shadow-1@2x.png') }}" />

        <div class="navigation5">
            <img class="navigation-child3" alt="" src="{{ asset('assets/vector-2.svg') }}" />

            <div class="frame-parent19">
                <div class="tags-parent3">
                    <div class="tags15" id="tagsContainer">
                        <b class="sample-text15">Trang chủ</b>
                    </div>
                    <div class="tags15" id="tagsContainer1">
                        <b class="sample-text15">Sự kiện</b>
                    </div>
                    <div class="tags17">
                        <b class="sample-text15">Liên hệ</b>
                    </div>
                </div>
                <div class="group-parent11">
                    <img class="group-icon29" alt="" src="{{ asset('assets/group4.svg') }}" />

                    <b class="sample-text15">{{ $info->phonenav }}</b>
                </div>
            </div>
            <img class="little-little-logo-ngang-15" alt=""
                src="{{ asset('assets/little--little-logo-ngang-1@2x.png') }}" />
        </div>
    </div>

    <div id="giLinHThnhCng" class="popup-overlay" style="display: none">
        <div class="gi-lin-h-thnh-cng">
            <div class="gi-lin-h-container">
                <p class="gi-lin-h">Gửi liên hệ thành công.</p>
                <p class="gi-lin-h">
                    Vui lòng kiên nhẫn đợi phản hồi từ chúng tôi, bạn nhé!
                </p>
            </div>
            <img class="x-icon" alt="" src="{{ asset('assets/x.svg') }}" />
        </div>
    </div>

    <script>
        var frameContainer1 = document.getElementById("frameContainer1");
        if (frameContainer1) {
            frameContainer1.addEventListener("click", function() {
                var popup = document.getElementById("giLinHThnhCng");
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
