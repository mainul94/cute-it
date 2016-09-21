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
			<div class="col-xs-12">{!! Form::submit('Save', ['class' => 'btn btn-sm btn-primary pull-right']) !!}</div>
			<p>
				<strong class="col-xs-4">Filename: </strong>
				<span class="col-xs-8">{!! $id->file_name !!}</span>
			</p>
			<p>
				<strong class="col-xs-4">File Size: </strong>
				<span class="col-xs-8">{!! $id->file_size !!}</span>
			</p>
			<p>
				<strong class="col-xs-4">File Dimension: </strong>
				<span class="col-xs-8">{!! $id->file_dimension !!}</span>
			</p>
			<div>
				<strong class="col-xs-12">URL: </strong>
				<div class="input-group col-xs-12
				">
					<input readonly id="url" class="form-control input-group" type="text" value="{!! asset($id->url) !!}"
						   aria-describedby="url-addon">
					<a href="#" class="input-group-addon" id="url-addon"  data-toggle="tooltip"
					   data-placement="bottom" title="Copy" data-clipboard-target="#url">
						<i class="fa fa-copy"></i></a>
				</div>
			</div>
			<div>
				<strong class="col-xs-12">Preview URL: </strong>
				<div class="input-group col-xs-12
				">
					<input readonly id="preview_url" class="form-control input-group" type="text" value="{!! asset($id->preview_rul) !!}"
						   aria-describedby="preview_url-addon">
					<a href="#" class="input-group-addon" id="preview_url-addon"  data-toggle="tooltip"
					   data-placement="bottom" title="Copy" data-clipboard-target="#preview_url">
						<i class="fa fa-copy"></i></a>
				</div>
			</div>
			<div>
				<strong class="col-xs-12">Thumbnail URL: </strong>
				<div class="input-group col-xs-12
				">
					<input readonly id="thumbnail_url" class="form-control input-group" type="text" value="{!! asset($id->thumbnail_url) !!}"
						   aria-describedby="thumbnail_url-addon">
					<a href="#" class="input-group-addon" id="thumbnail_url-addon"  data-toggle="tooltip"
					   data-placement="bottom" title="Copy" data-clipboard-target="#thumbnail_url">
						<i class="fa fa-copy"></i></a>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="row">
				<div class="col-xs-12 form-group {!! $errors->has('title')?'has-error':'' !!}">
					{!! Form::label('title', 'Title', ['class' => 'col-sm-4']) !!}
					<div class="col-xs-10">
						{!! Form::text('title', null, ['class' => 'form-control']) !!}
						{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
				<div class="col-xs-12 form-group {!! $errors->has('caption')?'has-error':'' !!}">
					{!! Form::label('caption', 'Caption', ['class' => 'col-sm-4']) !!}
					<div class="col-xs-10">
						{!! Form::textarea('caption', null, ['class' => 'form-control', 'rows'=>4]) !!}
						{!! $errors->first('caption', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
				<div class="col-xs-12 form-group {!! $errors->has('caption')?'has-error':'' !!}">
					<div class="col-xs-12"><strong>Image</strong></div>
					<div class="col-xs-10">
						<img class="img-responsive img-thumbnail" src="{!! $id->thumbnail_url?asset($id->thumbnail_url):asset($id->url) !!}" alt="image" />
					</div>
				</div>

				<div class="col-xs-12 form-group {!! $errors->has('description')?'has-error':'' !!}">
					{!! Form::label('description', 'Description', ['class' => 'col-sm-4']) !!}
					<div class="col-xs-10">
						{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
						{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
				<div class="col-xs-12 form-group {!! $errors->has('alt')?'has-error':'' !!}">
					{!! Form::label('alt', 'Alternative Text', ['class' => 'col-sm-4']) !!}
					<div class="col-xs-10">
						{!! Form::text('alt', null, ['class' => 'form-control']) !!}
						{!! $errors->first('alt', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
@endsection
@section('script_call')
	@parent
	<script>
		var clip = new Clipboard('#url-addon,#preview_url-addon,#thumbnail_url-addon');
	</script>
@endsection