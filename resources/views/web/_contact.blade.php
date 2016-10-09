<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/9/16
 * Time: 11:25 AM
 */
?>


<div class="row">

	@if(!empty(session()->has('message')))
		@include('_partial.message_print')
		<div class="clearfix"></div>
	@endif
	<div class="col-md-6 col-sm-6">
		@php $company_address = setting('company_address') @endphp
		<div class="contact-address">
			{!! $company_address->property_values !!}
		</div>

		<div id="map">
		</div>
	</div> <!-- /.col-md-6 -->
	<div class="col-md-6 col-sm-6">

		<div class="row contact-form">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			{!! Form::open(['action'=>'WebController@postContact']) !!}
			<fieldset class="col-md-6 col-sm-6">
				<input id="name" type="text" name="name" placeholder="Name">
			</fieldset>
			<fieldset class="col-md-6 col-sm-6">
				<input type="email" name="email" id="email" placeholder="Email">
			</fieldset>
			<fieldset class="col-md-12">
				<input type="text" name="subject" id="subject" placeholder="Subject">
			</fieldset>
			<fieldset class="col-md-12">
				<textarea name="message" id="message" placeholder="Message"></textarea>
			</fieldset>
			<fieldset class="col-md-12">
				<input type="submit" name="send" value="Send Message" id="submit" class="button">
			</fieldset>
			{!! Form::close() !!}
		</div> <!-- /.contact-form -->

	</div> <!-- /.col-md-6 -->
</div>
@section('script_call')
	@parent
	@php $map_LatLng = setting('google_mpa_lat_lng') @endphp
	<script>

		var map = '';

		function initialize() {
			var mapOptions = {
				zoom: 14,
				center: new google.maps.LatLng({{$map_LatLng->property_values}})
			};
			map = new google.maps.Map(document.getElementById('map'),  mapOptions);
		}

		// load google map
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
				'callback=initialize';
		document.body.appendChild(script);
	</script>
@endsection