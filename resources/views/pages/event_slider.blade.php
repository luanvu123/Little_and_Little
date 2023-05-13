<div class="s-kin-12">
    <img class="s-kin-1-child" alt="" src="{{ asset('uploads/event/' . $event->image) }}" />
    <div class="group-parent2">
        <div class="frame-wrapper">
            <div class="frame-parent7">
                <div class="s-kin-1-parent">
                    <b class="s-kin-13">{{ $event->title }}</b>
                    <div class="m-sen-park1">{{ $event->title_order }}</div>
                </div>
                <div class="time1">
                    <img class="icons-calendar1" alt="" src="{{ asset('assets/icons--calendar.svg') }}" />
                    <div class="div36">{{ $event->start_date }} - {{ $event->end_date }}</div>
                </div>
            </div>
        </div>
        <b class="vn1">{{ number_format($event->price, 0, ',', '.') }} VNĐ</b>
        <div class="btn-xem-chi-tit" id="btnXemChiTit" data-slug="{{ $event->slug }}">
            <div class="xem-chi-tit">Xem chi tiết</div>
            <div class="xem-chi-tit-btn">
                <img class="group-icon10" alt="" src="{{ asset('assets/group9.svg') }}" />
                <div class="xem-chi-tit1">Xem chi tiết</div>
            </div>
        </div>

        {{-- <div class="p-t-33">
            <div class="flex-w flex-r-m p-b-10">
                <div class="size-204 flex-w flex-m respon6-next">
                    <form action="/add-cart" method="post">
                        @if ($event->price !== null)
                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                </div>

                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="num_event"
                                    value="1">

                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                </div>
                            </div>


                            <button type="submit" class="btn-xem-chi-tit ">
                                Add to cart
                            </button>
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                        @endif
                        @csrf
                    </form>
                </div>
            </div>
        </div> --}}

    </div>
</div>
