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
                             {{-- <img class="image-3-icon" src="{{ asset($order->qr_code) }}" alt="QR Code"> --}}
                             {{-- <img class="image-3-icon" src="{{ asset('qrcodes/'.$orderId.'.png') }}" alt="QR Code"> --}}

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
                         top: 25px;
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
                 <div class="trang-13">Trang 1</div>

             </div>
             <div class="btn-xem-chi-tit4" onclick="downloadTickets()">
                 <div class="xem-chi-tit-btn4">
                     <img class="group-icon16" alt="" src="{{ asset('assets/group10.svg') }}" />

                     <div class="ti-v">
                         <span class="ti-v-txt-container">Tải vé
                         </span>
                     </div>
                 </div>
             </div>
             <div class="btn-xem-chi-tit5">
                 <div class="xem-chi-tit-btn4">
                     <img class="group-icon16" alt="" src="{{ asset('assets/group11.svg') }}" />

                     <div class="ti-v">
                         <span class="ti-v-txt-container">Gửi Email</span>
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

     <script>
         document.addEventListener("DOMContentLoaded", function() {
             var tiVElement = document.querySelector(".btn-xem-chi-tit5");
             tiVElement.addEventListener("click", function() {
                 window.location.href = "{{ route('about') }}";
             });
         });
     </script>
     <script>
         document.querySelector('.btn-xem-chi-tit4').addEventListener('click', function() {
             // Lấy danh sách các vé
             var veElements = document.querySelectorAll('.v-1 .v-11');

             // Tạo container để chứa thông tin vé
             var container = document.createElement('div');

             // CSS cho vé
             var css = `
            .ticket-card {
                display: inline-block;
                width: 200px;
                height: 300px;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 10px;
                background-color: #f5f5f5;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            .ticket-card .image-3-icon {
                width: 80px;
                height: 80px;
                margin: 10px auto;
            }
            .ticket-card .alt20210501 {
                font-weight: bold;
            }
            .ticket-card .v-cng {
                color: #555;
            }
            .ticket-card .ngy-s-dng1 {
                margin-top: 10px;
            }
            .ticket-card .b3 {
                margin-top: 10px;
                color: #999;
            }
            .ticket-card .tick-1-icon {
                width: 20px;
                height: 20px;
                margin-top: 10px;
            }
        `;

             // Chèn CSS vào container
             var styleElement = document.createElement('style');
             styleElement.innerHTML = css;
             container.appendChild(styleElement);

             // Lặp qua danh sách vé và thêm thông tin vào container
             veElements.forEach(function(veElement) {
                 var imageSrc = veElement.querySelector('.image-3-icon').src;
                 var orderId = veElement.querySelector('.alt20210501').textContent;
                 var date = veElement.querySelector('.ngy-s-dng1').textContent;

                 // Tạo một đối tượng vé
                 var ve = document.createElement('div');
                 ve.className = 'ticket-card';
                 ve.innerHTML = `
                <img class="image-3-icon" alt="" src="${imageSrc}" /><br>
                <b class="alt20210501" name="partnerCode">${orderId}</b><br>
                <b class="v-cng">VÉ CỔNG</b><br>
                <div class="ngy-s-dng1">${date}</div><br>
                <b class="b3">---</b><br>
                <img class="tick-1-icon" alt="" src="{{ asset('assets/tick-1.svg') }}" /><br>
            `;

                 // Thêm vé vào container
                 container.appendChild(ve);
             });

             // Tạo tập tin HTML từ container
             var htmlContent = container.innerHTML;

             // Tạo tập tin để tải về
             var blob = new Blob([htmlContent], {
                 type: 'text/html'
             });
             var url = URL.createObjectURL(blob);

             // Tạo thẻ a để tải về tập tin
             var link = document.createElement('a');
             link.href = url;
             link.download = 've.html';

             // Thêm thẻ a vào body và thực hiện tải về
             document.body.appendChild(link);
             link.click();
             document.body.removeChild(link);
         });
     </script>
 @endsection
