<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/28/16
 * Time: 5:47 PM
 */?>
@if(empty($init_id))
	@php $init_id = 1 @endphp
@endif
@if(empty($caption_bg))
	@php $caption_bg = '#55c58f' @endphp
@endif
@if(empty($color))
	@php $color = '#fff' @endphp
@endif

<div class="feature_slide">
	<div id="carousel-{{$init_id}}" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
	{{--<ol class="carousel-indicators">
		<li data-target="#carousel-{{$init_id}}" data-slide-to="0"></li>
		<li data-target="#carousel-{{$init_id}}" data-slide-to="1"></li>
		<li data-target="#carousel-{{$init_id}}" data-slide-to="2"></li>
	</ol>--}}

	<!-- Wrapper for slides -->
		<div class="carousel-inner" style="{{ !empty($height)?'height: '.$height.'px;':'' }}" role="listbox">
			@foreach($slide as $key=>$child)
				@if(isset($child->feature_image))
					<div class="item {{ $key==0?'active':'' }}" data-thumbnail-url="{{ $child->feature_image }}" data-thumbnail-alt="{!! $child->title !!}">
						<div class="col-sm-6">
							<img class="img-responsive" src="{{ asset($child->feature_image) }}" alt="{!! $child->title !!}">
						</div>
						<div class="col-sm-6 caption" style="background-color:{{ $caption_bg }}; color: {{ $color }}; height: inherit">
							<h2 style="color: {{ $color }}">{!! $child->title !!}</h2>
							<p>{!! $child->summery !!}</p>
							<p class="text-center">
								<a href="{{ url($category->slug.'/'.$child->slug) }}" class="btn btn-success">Read More</a>
							</p>
						</div>
					</div>
				@endif
			@endforeach

		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-{{$init_id}}" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-{{$init_id}}" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<h3 class="text-center">
		<a href="{{ url($category->slug) }}" class="btn btn-lg btn-info">See All Our {{ $category->title }}</a>
	</h3>
</div>
