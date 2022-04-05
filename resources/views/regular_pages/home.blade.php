@extends('layouts.master',['hideBreadcrumb'=> true, 'transparentHeader'=> true,'inversedLogo' => false])
@section('style')
    <style>
        @media all and (max-width:575px){
            .skill-box {
                transform: translateY(0) !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="section-top pt-5 " style="background: rgb(41, 57, 79); ">
        <div class="container py-5">
            <div class="banner-header">
                <div class="row">
                    <div class="col-12">
                        <div class="top-banner">
                            <div class="row align-items-center text-center">
                                <div class="col-md-12 mb-2">
                                    <div class="top-banner-text px-lg-5 text-justify mb-3">
                                        <h1 class="text-center text-info pt-4">NEXT LEVEL LARAVEL</h1>
                                        <p class="text-center mb-3 m-auto text-white" style="max-width: 500px; line-height: 1.5; margin-top: 40px !important">Laraframe enhanced the laravel functionalities the way it can be used easier and faster with built in functionalities</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="top-banner-img">
                                        <img src="{{ asset('images/home/website.png') }}" alt=""
                                             class="img-fluid" style="opacity: 0.1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container py-5">
            <div class="our-skill px-lg-5 mx-lg-5 text-center">
                <div class="row">
                    <div style="transform:translateY(-16px)" class="skill-box col-lg-3 col-md-6 col-sm-6">
                        <div class="card my-2" style="box-shadow: 3px 3px 0 4px #543ec1;">
                            <img class="card-img-top img-fluid py-3" src="{{ asset('images/home/php.png') }}"
                                 alt="">
                            <div class="card-body pt-2">
                                <h5 class="text-primary">PHP</h5>
                                <h6 class="text-dark pb-1">The PHP Hypertext</h6>
                                <p><small class="text-muted">PHP 7.2+ supported.</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div style="transform:translateY(16px)" class="skill-box col-lg-3 col-md-6 col-sm-6">
                        <div class="card my-2" style="box-shadow: 3px 3px 0 4px #ff3600;">
                            <img class="card-img-top img-fluid py-3" src="{{ asset('images/home/laravel.png') }}"
                                 alt="">
                            <div class="card-body pt-2">
                                <h5 class="text-primary">LARAVEL</h5>
                                <h6 class="text-dark pb-1">Contribute to laravel</h6>
                                <p><small class="text-muted">Laravel 6.x supported.</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div style="transform:translateY(-16px)" class="skill-box col-lg-3 col-md-6 col-sm-6">
                        <div class="card my-2" style="box-shadow: 3px 3px 0 4px #1b568c;">
                            <img class="card-img-top img-fluid py-3" src="{{ asset('images/home/mysql.png') }}"
                                 alt="">
                            <div class="card-body pt-2">
                                <h5 class="text-primary">MYSQL</h5>
                                <h6 class="text-dark pb-1">The most comprehensive</h6>
                                <p><small class="text-muted">MySql 5.7+ supported.</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div style="transform:translateY(16px)" class="skill-box col-lg-3 col-md-6 col-sm-6">
                        <div class="card my-2" style="box-shadow: 3px 3px 0 4px #dc0000;">
                            <img class="card-img-top img-fluid py-3" src="{{ asset('images/home/redis.png') }}"
                                 alt="">
                            <div class="card-body pt-2">
                                <h5 class="text-primary">REDIS</h5>
                                <h6 class="text-dark pb-1">The home of Redis</h6>
                                <p><i class="fa fa-map-marker mr-1" aria-hidden="true"></i>
                                    <small class="text-muted">Redis supported</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="background: url({{asset('images/home/tech-wp.png')}}); background-position: center center; background-size: cover; background-attachment: fixed;">
        <div style="background: rgba(205,165,88,.95); " class="py-5">
            <div class="container py-5">
                <div class="row text-center align-items-center">
                    <div class="col-md-6">
                        <img src="{{asset('images/home/problem.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6 text-center">
                        <h2 style="font-size: 40px;" class="text-primary">STUCK WITH PROJECT?</h2>
                        <p class="mt-4" style="line-height: 1.5">Developing a project needs a lot of regular processes you need to go through every time. Laraframe brings the solution for you.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="pt-5">
            <div class="container">
                <div class="row text-center align-items-center pt-5 pb-4">
                    <div class="col-md-6">
                        <h2 style="font-size: 40px;">LET's bE <span style="color: #FD5F00">cREATIVe</span></h2>
                        <p class="mt-4" style="line-height: 1.5">Let larframe handle all the hassle and concentrate on the core development with your smart thinking.</p>
                    </div>
                    <div class="col-md-4 offset-md-2">
                        <img src="{{asset('images/home/think.jpg')}}" alt="" class="img-fluid my-4" style="filter: drop-shadow(-14px -14px 0 #EAC06C);">
                    </div>
                </div>
                <div class="row text-center align-items-center pt-5">
                    <div class="col-md-6 order-md-1">
                        <h2 style="font-size: 40px;">WORK <span style="color: #FD5F00">SMART</span> RIGHT AWAY</h2>
                        <p class="my-4" style="line-height: 1.5">Let the laraframe be your assistant to let you start your task with your very smart skill.</p>
                    </div>
                    <div class="col-md-6 order-md-0">
                        <img src="{{asset('images/home/smart.png')}}" alt="" class="img-fluid" style="filter: drop-shadow(-14px -14px 0 #EAC06C);">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="background: url({{asset('images/home/time.jpg')}}); background-position: center center; background-size: cover; background-attachment: fixed;">
        <div style="background: rgba(205,165,88,.9); " class="py-5">
            <div class="container py-5">
                <div class="row text-center justify-content-center">
                   <div class="col-sm-6">
                       <div class="bg-white py-5 px-4" style="line-height: 2; font-size: 16px; border-radius: 20px">
                           <em>Laraframe is a swiss army knife for any php developer especially for laravel. Open it, use it, get your porject done and use the saved time for your relaxation.
                               <br>
                               <br>
                               As simple as that.</em>
                           <p class="mt-4 mb-0"><strong>- Lee Drake</strong></p>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>


    <div class="our-team text-center py-5">
        <div class="container">
            <h2 class="mb-5">Meet Our Team</h2>

            <div class="row">
                <div class="col-md-4">
                    <div class="card my-3">
                        <div class="card-img-top">
                            <div style="position:relative; margin: 40px auto; border-radius: 50%; overflow: hidden; width:100px; height: 100px;">
                                <img class="w-100" src="{{ asset('images/home/rana.jpg') }}" alt="">
                            </div>
                        </div>
                    <div class="card-img-icon">
                        <ul class="d-flex w-100 justify-content-center mt-3">
                            <li><a href="#" class="px-2"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="px-2"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="px-2"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="px-2"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="py-3">
                        <h5 class="text-success">IBRAHIM RANA</h5>
                        <p class="mb-4">Senior Dev</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card my-3">
                        <div class="card-img-top">
                            <div style="position:relative; margin: 40px auto; border-radius: 50%; overflow: hidden; width:100px; height: 100px;">
                                <img class="w-100" src="{{ asset('images/home/zahid.jpg') }}" alt="">
                            </div>
                        </div>
                            <div class="card-img-icon">
                                <ul class="d-flex w-100 justify-content-center mt-3">
                                    <li><a href="#" class="px-2"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        <div class="py-3">
                            <h5 class="text-success">ZAHIDUR RAHMAN</h5>
                            <p class="mb-4">Senior Dev</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card my-3">
                        <div class="card-img-top">
                            <div style="position:relative; margin: 40px auto; border-radius: 50%; overflow: hidden; width:100px; height: 100px;">
                                <img class="w-100" src="{{ asset('images/home/rabbi.jpg') }}" alt="">
                            </div>
                        </div>
                            <div class="card-img-icon">
                                <ul class="d-flex w-100 justify-content-center mt-3">
                                    <li><a href="#" class="px-2"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        <div class="py-3">
                            <h5 class="text-success">M G RABBI</h5>
                            <p class="mb-4">Senior Dev</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card my-3">
                        <div class="card-img-top">
                            <div style="position:relative; margin: 40px auto; border-radius: 50%; overflow: hidden; width:100px; height: 100px;">
                                <img class="w-100" src="{{ asset('images/home/shadhin.jpg') }}" alt="">
                            </div>
                        </div>
                            <div class="card-img-icon">
                                <ul class="d-flex w-100 justify-content-center mt-3">
                                    <li><a href="#" class="px-2"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        <div class="py-3">
                            <h5 class="text-success">SHADHIN OYIO</h5>
                            <p class="mb-2">Senior Dev</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card my-3">
                        <div class="card-img-top">
                            <div style="position:relative; margin: 40px auto; border-radius: 50%; overflow: hidden; width:100px; height: 100px;">
                                <img class="w-100" src="{{ asset('images/home/robin1.1.jpg') }}" alt="">
                            </div>
                        </div>
                            <div class="card-img-icon">
                                <ul class="d-flex w-100 justify-content-center mt-3">
                                    <li><a href="#" class="px-2"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        <div class="py-3">
                            <h5 class="text-success">MD RAHMAN</h5>
                            <p class="mb-2">Senior Web Designer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card my-3">
                        <div class="card-img-top">
                            <div style="position:relative; margin: 40px auto; border-radius: 50%; overflow: hidden; width:100px; height: 100px;">
                                <img class="w-100" src="{{ asset('images/home/hasib.jpg') }}" alt="">
                            </div>
                        </div>
                            <div class="card-img-icon">
                                <ul class="d-flex w-100 justify-content-center mt-3">
                                    <li><a href="#" class="px-2"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="px-2"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        <div class="py-3">
                            <h5 class="text-success">HASIB SUMON</h5>
                            <p class="mb-2">WEB DESIGNER</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


{{--<div class="col-md-3 col-sm-6">--}}
{{--    <div class="card my-3">--}}
{{--        <div class="card-img-top">--}}
{{--            <img class="img-fluid bg-warning p-3" src="{{ asset('images/home/hafiz-400x490.jpg') }}" alt="">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="card-img-icon">--}}
{{--        <ul class="d-flex w-100 justify-content-center mt-3">--}}
{{--            <li><a href="#" class="px-2"><i class="fa fa-facebook"></i></a></li>--}}
{{--            <li><a href="#" class="px-2"><i class="fa fa-twitter"></i></a></li>--}}
{{--            <li><a href="#" class="px-2"><i class="fa fa-instagram"></i></a></li>--}}
{{--            <li><a href="#" class="px-2"><i class="fa fa-google-plus"></i></a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="py-3">--}}
{{--        <h5 class="text-success">HAFIZUR RAHMAN</h5>--}}
{{--        <p class="mb-2">UI-UX Designer</p>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-md-3 col-sm-6">--}}
{{--    <div class="card my-3">--}}
{{--        <div class="card-img-top">--}}
{{--            <img class="img-fluid bg-warning p-3" src="{{ asset('images/home/ratul.jpg') }}" alt="">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="card-img-icon">--}}
{{--        <ul class="d-flex w-100 justify-content-center mt-3">--}}
{{--            <li><a href="#" class="px-2"><i class="fa fa-facebook"></i></a></li>--}}
{{--            <li><a href="#" class="px-2"><i class="fa fa-twitter"></i></a></li>--}}
{{--            <li><a href="#" class="px-2"><i class="fa fa-instagram"></i></a></li>--}}
{{--            <li><a href="#" class="px-2"><i class="fa fa-google-plus"></i></a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="py-3">--}}
{{--        <h5 class="text-success">RATUL KHAN</h5>--}}
{{--        <p class="mb-2">Frontend Dev</p>--}}
{{--    </div>--}}
{{--</div>--}}
