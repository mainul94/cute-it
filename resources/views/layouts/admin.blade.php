<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/23/16
 * Time: 3:35 PM
 */
?>

@extends('layouts.base')
@section('body_class') nav-md @endsection
@section('body')
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                @include('_partial.left_col')
            </div>
            @yield('content')
        </div>
    </div>
@endsection