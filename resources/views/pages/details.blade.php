 @extends('layout')
 @section('content')
     <div class="s-kin">
         <div class="frame3">
             <div class="render-1"></div>
         </div>
         <div class="bg">
             <img class="group-icon5" alt="" src="{{ asset('assets/group5.svg') }}" />

             <div class="frame4"></div>
             <div class="frame5"></div>
             <div class="s-kin-1">{{ $detail->title }}</div>
         </div>
         <img class="group-icon6" alt="" src="{{ asset('assets//group6.svg') }}" />

         <div class="khung-cha-v">
             <img class="group-icon7" alt="" src="{{ asset('assets/group7.svg') }}" />

             <div class="group-container">
                 <div class="frame-parent3">
                     <div class="rectangle-wrapper">
                         <img class="frame-item" alt="" src="{{ asset('uploads/event/' . $detail->image) }}" />
                     </div>
                     <div class="time-parent">
                         <div class="time">
                             <img class="icons-calendar" alt="" src="{{ asset('assets/icons--calendar.svg') }}" />

                             <div class="div35">{{ $detail->start_date }} - {{ $detail->end_date }}</div>
                         </div>
                         <div class="m-sen-park">{{ $detail->title_order }}</div>
                         <b class="vn">{{ $detail->price }}</b>
                     </div>
                 </div>
                 <div class="frame-parent4">
                     <div class="rectangle-container">
                         <img class="frame-inner" alt="" src="{{ asset('uploads/event2/' . $detail->image2) }}" />
                     </div>
                     <div class="lorem-ipsum-is">
                         {{ $detail->description1 }}
                     </div>
                 </div>
                 <div class="frame-parent5">
                     <div class="rectangle-frame">
                         <img class="frame-inner" alt="" src="{{ asset('uploads/event3/' . $detail->image3) }}" />
                     </div>
                     <div class="lorem-ipsum-is1">
                         {{ $detail->description2 }}
                     </div>
                 </div>
                 <div class="lorem-ipsum-is-container">
                     <span class="lorem-ipsum-is-container1">
                         <b class="lorem-ipsum">Lorem Ipsum</b>
                         <span class="is-simply-dummy">
                             {{ $detail->description3 }}</span>
                     </span>
                 </div>
             </div>
         </div>
         <img class="frame-icon6" alt="" src="{{ asset('assets/frame5.svg') }}" />

         <img class="frame-icon7" alt="" src="{{ asset('assets/frame6.svg') }}" />

         <div class="navigation1">
             <img class="navigation-item" alt="" src="{{ asset('assets/vector-2.svg') }}" />

             <div class="frame-parent6">
                 <div class="tags-group">
                     <div class="tags3" id="tagsContainer">
                         <b class="sample-text3">Trang chủ</b>
                     </div>
                     <div class="tags4">
                         <b class="sample-text3">Sự kiện</b>
                     </div>
                     <div class="tags3" id="tagsContainer2">
                         <b class="sample-text3">Liên hệ</b>
                     </div>
                 </div>
                 <div class="group-parent1">
                     <img class="group-icon8" alt="" src="{{ asset('assets/group4.svg') }}" />

                     <b class="sample-text3">0123456789</b>
                 </div>
             </div>
             <img class="little-little-logo-ngang-11" alt=""
                 src="{{ asset('assets/little--little-logo-ngang-1@2x.png') }}" />
         </div>
     </div>
 @endsection
