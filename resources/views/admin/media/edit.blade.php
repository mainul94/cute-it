<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/30/16
 * Time: 2:03 PM
 */
?>

@extends('layouts.admin')
@section('title') Edit Media @endsection
@section('content')
	<div class="row">
		{!! Form::model($id,['action' => ['MediaController@update', $id->slug], 'method' => 'PATCH']) !!}
		<div class="col-sm-4 pull-right bg-info">
			<br>
			<p>
				<strong class="col-xs-4">Filename: </strong>
				<span class="col-xs-8">{!! $id->file_name !!}</span>
			</p>
			<p>
				<strong class="col-xs-4">URL: </strong>
				<span class="col-xs-12"><input class="form-control" readonly type="text" value="{!! asset($id->url) !!}"></span>
			</p>
			<p></p>
		</div>
		<div class="col-sm-8">
			<div class="row">
				<div class="col-xs-12 form-group">
					{!! Form::label('title', 'Title', ['class' => 'col-sm-4']) !!}
					<div class="col-xs-10">
						{!! Form::text('title', null, ['class' => 'form-control']) !!}
					</div>
					{!! Form::submit('Save', ['class' => 'btn btn-sm btn-primary']) !!}
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
@endsection