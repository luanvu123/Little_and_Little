 @extends('layout')
 @section('content')
     <div class="thanh-ton-thnh-cng">
         <div class="frame7">
             <img class="bg-icon1" alt="" src="{{ asset('assets/bg1.svg') }}" />

             <div class="khung-cha-v1">
                 <img class="group-icon15" alt="" src="{{ asset('assets/group7.svg') }}" />

                 <div class="v-1">
                     @for ($i = 1; $i <= $number; $i++)
                         <div class="v-11" style="left: {{ ($i - 1) * 320 }}px">
                             <img class="image-3-icon" alt="" src="{{ asset('assets/image-3@2x.png') }}" />
                             <b class="alt20210501" name="partnerCode">{{ $orderId }}</b>
                             <b class="v-cng">VÉ CỔNG</b>
                             <div class="ngy-s-dng1">Ngày sử dụng: {{ $date }}</div>
                             <b class="b3">---</b>
                             <img class="tick-1-icon" alt="" src="{{ asset('assets/tick-1.svg') }}" />
                         </div>
                     @endfor
                 </div>

                 <style>
                     .v-1 {
                         position: relative;
                         width: {{ $number * 320 }}px;
                         margin: 0 auto;
                         padding: 0 20px;
                         display: flex;
                         flex-wrap: wrap;
                     }

                     .v-11 {
                         position: absolute;
                         height: 95.42%;
                         width: 300px;
                         top: 0;
                         right: 0;
                         bottom: 4.58%;
                         border-radius: var(--br-base);
                         background-color: var(--w);
                     }

                     .v-11:not(:last-child) {
                         margin-right: 20px;
                     }

                     .v-11 img.image-3-icon {
                         display: block;
                         margin: 30px auto;
                     }

                     .v-11 b {
                         display: block;
                         text-align: center;
                         font-size: 24px;
                         line-height: 32px;
                         margin-bottom: 15px;
                     }

                     .v-11 b.alt20210501 {
                         font-weight: 700;
                     }

                     .v-11 b.v-cng {
                         font-size: 16px;
                         line-height: 24px;
                         margin-bottom: 30px;
                     }

                     .v-11 div.ngy-s-dng1 {
                         font-size: 16px;
                         line-height: 24px;
                         text-align: center;
                         margin-bottom: 30px;
                     }

                     .v-11 b.b3 {
                         display: block;
                         font-size: 18px;
                         line-height: 24px;
                         text-align: center;
                         margin-bottom: 20px;
                     }

                     .v-11 img.tick-1-icon {
                         display: block;
                         margin: 0 auto;
                     }
                 </style>

                 <img class="previous-btn-icon1" alt="" src="{{ asset('assets/previous-btn.svg') }}" />

                 <img class="next-btn-icon1" alt="" src="{{ asset('assets/next-btn1.svg') }}" />

                 <div class="s-lng-12">Số lượng: {{ $number }} vé</div>
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

                     <b class="sample-text9">{{ $info->phonenav }}</b>
                 </div>
             </div>
             <img class="little-little-logo-ngang-13" alt=""
                 src="{{ asset('assets/little--little-logo-ngang-1@2x.png') }}" />
         </div>
     </div>
     <script>
         const nextButton = document.querySelector('.next-btn-icon1');
         const ticketsContainer = document.querySelector('.v-1');
         const tickets = ticketsContainer.querySelectorAll('.v-11');

         let currentPage = 0;

         nextButton.addEventListener('click', () => {
             if (currentPage < tickets.length - 1) {
                 currentPage++;
                 ticketsContainer.style.transform = `translateX(-${currentPage * 320}px)`;
             }
         });
     </script>
     <script>
         const previousButton = document.querySelector('.previous-btn-icon1');

         previousButton.addEventListener('click', () => {
             if (currentPage > 0) {
                 currentPage--;
                 ticketsContainer.style.transform = `translateX(-${currentPage * 320}px)`;
             }
         });
     </script>
 @endsection
