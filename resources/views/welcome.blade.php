@extends('layouts.web')
@push('title') Welcome @endpush
@section('sections')
	@include('layouts._partial._web._slide',['slide'=>$slide])
	{{--Welcome Mesage--}}
	@php $welcome_msg = setting('welcome_message')->property_values @endphp
	<div class="container">
		{!! $welcome_msg !!}
	</div>
	{{--/Welcome Mesage--}}
	{{--Feature Category SLide--}}
	@inject('category','\App\Category')
	@php $show_feature = (int) setting('is_feature_news_show_in_home')->property_values;
		$feature_slide_length = (int) setting('home_feature_slide_length')->property_values or 5;
		$feature_slide_cat = (int) setting('home_recent_news_category')->property_values;
		$feature_categories = $category->find($feature_slide_cat); @endphp
	@if($show_feature && $feature_categories)
		<div class="container">
			<h1 class="section-title text-center">Our latest {!! $feature_categories->title !!}</h1>
			@include('layouts._partial._web._feature_slide',['slide'=>$feature_categories->articles()->limit($feature_slide_length)->orderBy('id','desc')->get(),
			'category'=>$feature_categories])
		</div>
	@endif
	{{--//Feature Category SLide--}}
	{{--Contact--}}
	<div class="container">
		<h1 class="section-title text-center">Keep in touch</h1>
		@include('web._contact')
	</div>
	{{--/COntact--}}

@endsection