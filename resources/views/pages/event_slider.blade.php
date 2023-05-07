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
        <b class="vn1">{{ $event->price }} VNĐ</b>
        <div class="btn-xem-chi-tit" id="btnXemChiTit" data-slug="{{ $event->slug }}">
            <div class="xem-chi-tit">Xem chi tiết</div>
            <div class="xem-chi-tit-btn">
                <img class="group-icon10" alt="" src="{{ asset('assets/group9.svg') }}" />
                <div class="xem-chi-tit1">Xem chi tiết</div>
            </div>
        </div>
    </div>
</div>
