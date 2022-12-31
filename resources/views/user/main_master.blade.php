<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> @yield('title') </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/img/favicon.png')}}">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
        <!-- Toastr online cdn link -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        {{-- CSS for the image show on full screen after clicking on it  --}}
        <style>
            .popup{
                width: 900px;
                margin: auto;
                text-align: center
            }
            .popup img{
                width: 1020;
                height: 519;
            }
            .show{
                z-index: 999;
                display: none; 
            }
            .show .overlay{
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,.66);
                position: absolute;
                top: 0;
                left: 0;
            }
            .show .img-show{
                width: 1250;
                height: 550;
                background: #FFF;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                overflow: hidden
            }
            .img-show span{
                position: absolute;
                top: 10px;
                right: 10px;
                z-index: 99;
                cursor: pointer;
            }
            .img-show img{
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
            }
        </style>
        {{-- CSS for the image show on full screen after clicking on it  --}}
    </head>
    <body class="active-dark-mode">
        {{-- <body> --}}

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
            @include('user.body.header')
        <!-- header-area-end -->

        <!-- main-area -->
        <main>
            @yield('user')
        </main>
        <!-- main-area-end -->



        <!-- Footer-area -->
            @include('user.body.footer')
        <!-- Footer-area-end -->

		<!-- JS here -->
        <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/element-in-view.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/ajax-form.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

        <!-- Toastr Link -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            @if(Session:: has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
            }
            @endif
        </script>
        {{-- Focus Image on full screen on click on it --}}
        {{-- <script>
            $(function () {
                "use strict";                
                $(".popup img").click(function () {
                    var src = $(this).attr("src");
                    console.log(src);                    
                    $(".show").fadeIn();
                    $(".img-show img").attr("src", src);
                });                
                $("span, .overlay").click(function () {
                    $(".show").fadeOut();
                });                
            });
        </script> --}}
        {{-- Focus Image on full screen on click on it --}}
    </body>
</html>
