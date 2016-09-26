<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/25/16
 * Time: 2:32 PM
 */
?>
@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    Edit Menu
                </div>
                <div class="x_content">
                    {!! Form::model($id,['action'=>['MenuController@update',$id->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
                    @include('admin.menu._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
