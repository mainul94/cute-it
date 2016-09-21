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
		<div class="col-sm-4 pull-right bg-info">
			<br>
			<div class="col-xs-12">
				<a class="btn btn-info" href="{!! action('MediaController@edit', $id->slug) !!}" title="Edit">Edit</a>
				{!! Html::delete('MediaController@destroy',$id->slug, 'button', 'btn btn-danger') !!}
			</div>
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
						<i class="glyphicon glyphicon-copy"></i></a>
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
						<i class="glyphicon glyphicon-copy"></i></a>
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
						<i class="glyphicon glyphicon-copy"></i></a>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="row">
				<div class="col-xs-12">
					<h4>Title :</h4>
					<div>{!! $id->title !!}</div>
				</div>
				<div class="col-xs-12">
					<h4>Caption :</h4>
					<div>{!! $id->caption !!}</div>
				</div>
				<div class="col-xs-12">
					<h4>Image :</h4>
					<div><img class="img-responsive img-thumbnail" src="{!! $id->thumbnail_url?asset($id->thumbnail_url):asset($id->url) !!}" alt="image" /></div>
				</div>
				<div class="col-xs-12">
					<h4>Description :</h4>
					<div>{!! $id->description !!}</div>
				</div>
				<div class="col-xs-12">
					<h4>Alternative Text :</h4>
					<div>{!! $id->alt !!}</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script_call')
	@parent
	<script>
		var clip = new Clipboard('#url-addon,#preview_url-addon,#thumbnail_url-addon');
	</script>
@endsection