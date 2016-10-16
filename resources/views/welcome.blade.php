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
	@php $categories = $category->whereIn('slug',$setting->getOnpageCategories())->orderBy('slug','asc')->paginate() @endphp

	{{--//Feature Category SLide--}}
	@foreach($categories as $category)
		@include('web._template._category.'.$category->template)
	@endforeach
	{{--Contact--}}
	<div class="container">
		<h1 class="section-title text-center">Keep in touch</h1>
		@include('web._contact')
	</div>
	{{--/COntact--}}

@endsection