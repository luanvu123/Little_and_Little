<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/trang-ch.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/s-kin1.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/contact-us.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/frame-46.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/gi-lin-h-thnh-cng.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/s-kin.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/thanh-ton-thnh-cng.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/thanh-ton.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=iCiel Koni:wght@900&display=swap" />
</head>

<body>

    @yield('content')


    <script>
        var tagsContainer = document.getElementById("tagsContainer");
        if (tagsContainer) {
            tagsContainer.addEventListener("click", function(e) {
                window.location.href = "{{ route('homepage') }}";
            });
        }

        var tagsContainer1 = document.getElementById("tagsContainer1");
        if (tagsContainer1) {
            tagsContainer1.addEventListener("click", function(e) {
                window.location.href = "{{ route('event') }}";
            });
        }

        var tagsContainer2 = document.getElementById("tagsContainer2");
        if (tagsContainer2) {
            tagsContainer2.addEventListener("click", function(e) {
                window.location.href = "{{ route('about') }}";
            });
        }
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/home.js') }}"></script>


    <script type="text/javascript">
        var slider = document.querySelector('.s-kin-11');
        var prevBtn = document.querySelector('.previous-btn-icon');
        var nextBtn = document.querySelector('.next-btn-icon');
        var currentIndex = 0;
        var slideCount = 4; // số lượng sự kiện hiển thị trên mỗi slide
        var totalSlides = Math.ceil(slider.childElementCount / slideCount); // tổng số slide cần hiển thị

        prevBtn.addEventListener('click', function() {
            currentIndex--;
            if (currentIndex < 0) {
                currentIndex = totalSlides - 1;
            }
            slider.style.transform = 'translateX(-' + currentIndex * 100 / totalSlides + '%)';
            if (currentIndex === totalSlides - 1) {
                nextBtn.style.display = 'none';
            } else {
                nextBtn.style.display = 'block';
            }
            prevBtn.style.display = 'block';
        });

        nextBtn.addEventListener('click', function() {
            currentIndex++;
            if (currentIndex >= totalSlides) {
                currentIndex = 0;
            }
            slider.style.transform = 'translateX(-' + currentIndex * 100 / totalSlides + '%)';
            if (currentIndex === 0) {
                prevBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'block';
            }
            nextBtn.style.display = 'block';
        });

        window.addEventListener('load', function() {
            totalSlides = Math.ceil(slider.childElementCount / slideCount);
            if (totalSlides <= 1) {
                nextBtn.style.display = 'none';
            }
        });
    </script>





</body>

</html>
