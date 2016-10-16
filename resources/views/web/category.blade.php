<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/29/16
 * Time: 3:13 PM
 */
?>
@extends('layouts.web')
@push('title') {!! $category->title !!} @endpush
@section('sections')
	<section id="products" class="content-section">
		@if(isset($category->slide_id))
			@include('layouts._partial._web._slide',['slide'=>$category->slide])
		@endif
		@if(!empty($category->feature_image) && empty($category->slide_id))
			<div style="height: 600px; width: 100%; float: left; background: url('{!! asset($category->feature_image) !!}'); background-size: cover;">
			</div>
		@endif
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 class="section-title">{!! $category->title !!}</h1>
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
			@php $articles = $category->articles()->paginate() @endphp
			<div class="col-xs-12">
				{!! $category->summery !!}
				{!! $category->content !!}
			</div>
			@if($category->template == "List")
				@include('web._partial._articles_list_view')
				@else
				@include('web._partial._category_grid_view')
			@endif
		</div> <!-- /.container -->
	</section>
@endsection