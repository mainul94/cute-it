<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/25/16
 * Time: 2:36 PM
 */
?>
@extends('layouts.admin')
@section('title') Setting list @endsection
@push('page_title_left') <h1>Setting</h1>@endpush
@section('content')
	<div class="row">
		{{--Home Company Address--}}
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h4>Home Company Address</h4>
				</div>
				<div class="x_content">
					@php $welcome_message = setting('welcome_message') @endphp
					{!! Form::model($welcome_message, ['action'=>['SettingController@update',$welcome_message->id], 'method'=> 'patch']) !!}
					{!! Form::textarea('property_values',$welcome_message->property_values,['class'=>'form-control welcome_message']) !!}
					<br>
					{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		{{--/Home Company Address--}}
		{{--Primary menu--}}
		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Primary Menu</h4>
				</div>
				<div class="x_content">
					@php $primary_menu = setting('primary_menu') @endphp
					{!! Form::model($primary_menu, ['action'=>['SettingController@update',$primary_menu->id], 'method'=> 'patch']) !!}
						@php $primary_menu_sel = $primary_menu->menu ? $primary_menu->menu->lists('title','id'):[] @endphp
						{!! Form::select('property_values',$primary_menu_sel,$primary_menu->property_values,['class'=>'form-control primary_menu']) !!}
					<br>
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		{{--/Primary menu--}}
		{{--Footer menu--}}
		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Footer Menu</h4>
				</div>
				<div class="x_content">
					@php $footer_menu = setting('footer_menu') @endphp
					{!! Form::model($footer_menu, ['action'=>['SettingController@update',$footer_menu->id], 'method'=> 'patch']) !!}
						@php $footer_menu_sel = $footer_menu->menu ? $footer_menu->menu->lists('title','id'):[] @endphp
						{!! Form::select('property_values',$footer_menu_sel,$footer_menu->property_values,['class'=>'form-control footer_menu']) !!}
					<br>
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		{{--/Footer menu--}}
		{{--Home Slide--}}
		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Home Slide</h4>
				</div>
				<div class="x_content">
					@php $home_slide = setting('home_slide') @endphp
					{!! Form::model($home_slide, ['action'=>['SettingController@update',$home_slide->id], 'method'=> 'patch']) !!}
						@php $home_slide_sel = $home_slide->slide ? $home_slide->slide->lists('title','id'):[] @endphp
						{!! Form::select('property_values',$home_slide_sel,$home_slide->property_values,['class'=>'form-control home_slide']) !!}
					<br>
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		{{--/Home Slide--}}
		{{--Home Recent Category--}}
		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Home Recent Category</h4>
				</div>
				<div class="x_content">
					@php $home_recent_news_category = setting('home_recent_news_category') @endphp
					{!! Form::model($home_recent_news_category, ['action'=>['SettingController@update',$home_recent_news_category->id], 'method'=> 'patch']) !!}
						@php $home_recent_news_category_sel = $home_recent_news_category->category ? $home_recent_news_category->category->lists('title','id'):[] @endphp
						{!! Form::select('property_values',$home_recent_news_category_sel,$home_recent_news_category->property_values,['class'=>'form-control home_recent_news_category']) !!}
					<br>
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		{{--/Home Recent Category--}}
		{{--Home Google Map latLng--}}
		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Home Google Map latLng</h4>
				</div>
				<div class="x_content">
					@php $google_mpa_lat_lng = setting('google_mpa_lat_lng') @endphp
					{!! Form::model($google_mpa_lat_lng, ['action'=>['SettingController@update',$google_mpa_lat_lng->id], 'method'=> 'patch']) !!}
						{!! Form::text('property_values',$google_mpa_lat_lng->property_values,['class'=>'form-control google_mpa_lat_lng']) !!}
					<br>
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		{{--/Home Google Map latLng--}}
		{{--Home Contact Email--}}
		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Home Contact Email</h4>
				</div>
				<div class="x_content">
					@php $contact_email = setting('contact_email') @endphp
					{!! Form::model($contact_email, ['action'=>['SettingController@update',$contact_email->id], 'method'=> 'patch']) !!}
					{!! Form::text('property_values',$contact_email->property_values,['class'=>'form-control contact_email']) !!}
					<br>
					{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		{{--/Home Contact Email--}}
		{{--Home Company Address--}}
		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Home Company Address</h4>
				</div>
				<div class="x_content">
					@php $company_address = setting('company_address') @endphp
					{!! Form::model($company_address, ['action'=>['SettingController@update',$company_address->id], 'method'=> 'patch']) !!}
						{!! Form::textarea('property_values',$company_address->property_values,['class'=>'form-control company_address']) !!}
					<br>
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		{{--/Home Company Address--}}
		{{--Social Link--}}
		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Facebook Link</h4>
				</div>
				<div class="x_content">
					@php $facebook_link = setting('facebook_link') @endphp
					{!! Form::model($facebook_link, ['action'=>['SettingController@update',$facebook_link->id], 'method'=> 'patch']) !!}
						{!! Form::text('property_values',$facebook_link->property_values,['class'=>'form-control facebook_link']) !!}
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Twitter Link</h4>
				</div>
				<div class="x_content">
					@php $twitter_link = setting('twitter_link') @endphp
					{!! Form::model($twitter_link, ['action'=>['SettingController@update',$twitter_link->id], 'method'=> 'patch']) !!}
						{!! Form::text('property_values',$twitter_link->property_values,['class'=>'form-control twitter_link']) !!}
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Google Plus Link</h4>
				</div>
				<div class="x_content">
					@php $google_plus_link = setting('google_plus_link') @endphp
					{!! Form::model($google_plus_link, ['action'=>['SettingController@update',$google_plus_link->id], 'method'=> 'patch']) !!}
						{!! Form::text('property_values',$google_plus_link->property_values,['class'=>'form-control google_plus_link']) !!}
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Youtube Link</h4>
				</div>
				<div class="x_content">
					@php $youtube_link = setting('youtube_link') @endphp
					{!! Form::model($youtube_link, ['action'=>['SettingController@update',$youtube_link->id], 'method'=> 'patch']) !!}
						{!! Form::text('property_values',$youtube_link->property_values,['class'=>'form-control youtube_link']) !!}
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>LinkdIn Link</h4>
				</div>
				<div class="x_content">
					@php $linkdin_link = setting('linkdin_link') @endphp
					{!! Form::model($linkdin_link, ['action'=>['SettingController@update',$linkdin_link->id], 'method'=> 'patch']) !!}
						{!! Form::text('property_values',$linkdin_link->property_values,['class'=>'form-control linkdin_link']) !!}
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h4>Printest Link</h4>
				</div>
				<div class="x_content">
					@php $pinterest_link = setting('pinterest_link') @endphp
					{!! Form::model($pinterest_link, ['action'=>['SettingController@update',$pinterest_link->id], 'method'=> 'patch']) !!}
						{!! Form::text('property_values',$pinterest_link->property_values,['class'=>'form-control pinterest_link']) !!}
						{!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		{{--/Social Link--}}
	</div>
@endsection
@section('footer_script')
	@parent
	<link href="{!! asset('vendors/summernote/css/summernote.css') !!}" rel="stylesheet">
	<script src="{!! asset('vendors/summernote/js/summernote.js') !!}"></script>
	<script src="{{ asset('js/panel.js') }}"></script>
	<script>
		getvalueForSelect2('.primary_menu','menus',['id','title'],[],'id','title');
		getvalueForSelect2('.footer_menu','menus',['id','title'],[],'id','title');
		getvalueForSelect2('.home_slide','slides',['id','title'],[],'id','title');
		getvalueForSelect2('.home_recent_news_category','categories',['id','title'],[],'id','title');
		$('.company_address').summernote({
			height:100
		});
		$('.welcome_message').summernote({
			height:160
		});
	</script>
@endsection