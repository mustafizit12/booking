<!doctype html>
<html lang="en" class="{{isset($headerLess) && $headerLess && settings('no_header_layout') ? ' no-header-light' : ''}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('storage/images/favicon.png') }}">
    @yield('meta')

    <title>
        @hasSection('title')
            @yield('title', config('app.name')) | {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>

    @yield('style-top')

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @if(!isset($headerLess) || !$headerLess)
        <link rel="stylesheet" href="{{ asset('plugins/slicknav/slicknav.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.css') }}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/bs4-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/login_style.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('style')
</head>
<body>
  <body class="{{(settings('navigation_type') && settings('side_nav_fixed')) || (isset($fixedSideNav) && $fixedSideNav) ? 'lf-fixed-sidenav' : ''}}{{isset($headerLess) && $headerLess ? ' lf-headerless-body' : ''}}">
  <div id="app" class="wrapper{{(settings('navigation_type') && settings('side_nav_fixed')) || (isset($fixedSideNav) && $fixedSideNav) ? ' lf-fixed-sidenav-wrapper' : ''}}" style="margin-left:280px;">
