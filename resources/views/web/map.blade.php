<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/29/16
 * Time: 3:13 PM
 */
?>
@extends('layouts.web')
@push('title') Article @endpush
@section('sections')
	<div class="clearfix"></div>
	<section class="content-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="section-title text-center">Where we work</h4>
					<p>Options has worked in over 50 countries throughout Africa, Asia, the Middle East and North Africa, and Latin America and the Caribbean.</p>
					<div id="map"></div>{{--/#map--}}

					@if(isset($regions))
						@foreach($regions as $region)
							@include('web._partial._country_list',['countries'=>$region->countries])
						@endforeach
					@elseif(isset($region))
						@include('web._partial._country_list',['countries'=>$region->countries])
					@endif


				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section>
@endsection