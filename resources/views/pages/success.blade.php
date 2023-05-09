 @extends('layout')
 @section('content')
     <div class="thanh-ton-thnh-cng">
         <div class="frame7">
             <img class="bg-icon1" alt="" src="{{ asset('assets/bg1.svg') }}" />

             <div class="khung-cha-v1">
                 <img class="group-icon15" alt="" src="{{ asset('assets/group7.svg') }}" />

                 <div class="v-1">
                     <div class="v-11">
                         <img class="image-3-icon" alt="" src="{{ asset('assets/image-3@2x.png') }}" />

                         <b class="alt20210501">ALT20210501</b>
                         <b class="v-cng">VÉ CỔNG</b>
                         <div class="ngy-s-dng1">Ngày sử dụng: 31/05/2021</div>
                         <b class="b3">---</b>
                         <img class="tick-1-icon" alt="" src="{{ asset('assets/tick-1.svg') }}" />
                     </div>
                 </div>
                 <div class="v-2">
                     <div class="v-11">
                         <img class="image-3-icon" alt="" src="{{ asset('assets/image-3@2x.png') }}" />

                         <b class="alt20210501">ALT20210501</b>
                         <b class="v-cng">VÉ CỔNG</b>
                         <div class="ngy-s-dng1">Ngày sử dụng: 31/05/2021</div>
                         <b class="b3">---</b>
                     </div>
                     <img class="tick-1-icon1" alt="" src="{{ asset('assets/tick-1.svg') }}" />
                 </div>
                 <div class="v-3">
                     <div class="v-11">
                         <img class="image-3-icon" alt="" src="{{ asset('assets/image-3@2x.png') }}" />

                         <b class="alt20210501">ALT20210501</b>
                         <b class="v-cng">VÉ CỔNG</b>
                         <div class="ngy-s-dng1">Ngày sử dụng: 31/05/2021</div>
                         <b class="b3">---</b>
                         <img class="tick-1-icon" alt="" src="{{ asset('assets/tick-1.svg') }}" />
                     </div>
                 </div>
                 <div class="v-4">
                     <div class="v-11">
                         <img class="image-3-icon" alt="" src="{{ asset('assets/image-3@2x.png') }}" />

                         <b class="alt20210501">ALT20210501</b>
                         <b class="v-cng">VÉ CỔNG</b>
                         <div class="ngy-s-dng1">Ngày sử dụng: 31/05/2021</div>
                         <b class="b3">---</b>
                         <img class="tick-1-icon" alt="" src="{{ asset('assets/tick-1.svg') }}" />
                     </div>
                 </div>
                 <img class="previous-btn-icon1" alt=""
            src="{{ asset('assets/previous-btn.svg') }}" />

                 <img class="next-btn-icon1" alt="" src="{{ asset('assets/next-btn1.svg') }}" />

                 <div class="s-lng-12">Số lượng: 12 vé</div>
                 <div class="trang-13">Trang 1/3</div>
             </div>
             <div class="btn-xem-chi-tit4">
                 <div class="xem-chi-tit8">Xem chi tiết</div>
                 <div class="xem-chi-tit-btn4">
                     <img class="group-icon16" alt="" src="{{ asset('assets/group10.svg') }}" />

                     <div class="ti-v">
                         <span class="ti-v-txt-container">T <span class="span">ả</span>i vé
                         </span>
                     </div>
                 </div>
             </div>
             <div class="btn-xem-chi-tit5">
                 <div class="xem-chi-tit8">Xem chi tiết</div>
                 <div class="xem-chi-tit-btn4">
                     <img class="group-icon16" alt="" src="{{ asset('assets/group11.svg') }}" />

                     <div class="ti-v">
                         <span class="ti-v-txt-container">G <span class="span1">ử</span>i Email
                         </span>
                     </div>
                 </div>
             </div>
             <img class="alvin-arnold-votay1-1-icon" alt=""
                 src="{{ asset('assets/alvin-arnold-votay1-1@2x.png') }}" />
         </div>
         <div class="thanh-ton-thnh">Thanh toán thành công</div>
         <div class="navigation3">
             <img class="navigation-child1" alt="" src="{{ asset('assets/vector-2.svg') }}" />

             <div class="frame-parent12">
                 <div class="tags-parent1">
                     <div class="tags9" id="tagsContainer">
                         <b class="sample-text9">Trang chủ</b>
                     </div>
                     <div class="tags9" id="tagsContainer1">
                         <b class="sample-text9">Sự kiện</b>
                     </div>
                     <div class="tags9" id="tagsContainer2">
                         <b class="sample-text9">Liên hệ</b>
                     </div>
                 </div>
                 <div class="group-parent7">
                     <img class="group-icon18" alt="" src="{{ asset('assets/group4.svg') }}" />

                     <b class="sample-text9">{{$info->phonenav}}</b>
                 </div>
             </div>
             <img class="little-little-logo-ngang-13" alt=""
                 src="{{ asset('assets/little--little-logo-ngang-1@2x.png') }}" />
         </div>
     </div>
 @endsection
