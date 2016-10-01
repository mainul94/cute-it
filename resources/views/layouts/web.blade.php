<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/23/16
 * Time: 3:34 PM
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('_partial.meta')
    <title>@stack('title')|UHSSP </title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- normalize -->
    <link href="{!! asset('vendors/normalize-css/normalize.css') !!}" rel="stylesheet">
    <!-- animate -->
    <link href="{!! asset('vendors/animate.css/animate.min.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/web_template/css/templatemo_misc.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/web_template/css/templatemo_style.css') }}">

    @yield('head')
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/web_custom.css') }}" rel="stylesheet">

    <script src="{{ asset('vendors/web_template/js/vendor/modernizr-2.6.2.min.js') }}"></script>
    @yield('head_script')
</head>
<body class="@yield('body_class')">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<div id="front">
    @include('layouts._partial._web._header')
</div> <!-- /#front -->
@yield('sections')


<div class="site-footer">
    @include('layouts._partial._web._footer')
</div> <!-- /.site-footer -->
<!-- jQuery -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/web_template/js/jquery.easing-1.3.js') }}"></script>
<script src="{{ asset('vendors/web_template/js/plugins.js') }}"></script>
{{--<script src="{{ asset('vendors/web_template/js/main.js') }}"></script>--}}

<!-- Custom Theme Scripts -->
{{--<script src="{{ asset('js/web_custom.js') }}"></script>--}}
{{--ToDo add file web_custom.js in asset and link to public--}}

@yield('footer_script')
@yield('script_call')

</body>
</html>
