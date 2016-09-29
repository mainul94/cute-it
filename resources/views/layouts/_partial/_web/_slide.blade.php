<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/28/16
 * Time: 5:47 PM
 */?>
<div class="site-slider">
	<ul class="bxslider">
		@if(isset($slide->slideChildren))
			@foreach($slide->slideChildren as $key=>$child)
			<li data-thumbnail-url="{{ $child->imageMedia->thumbnail_url }}" data-thumbnail-alt="{!! $child->title !!}">
				<img src="{{ asset($child->imageMedia->url) }}" alt="{!! $child->title !!}">
				<div class="container caption-wrapper">
					<div class="slider-caption">
						<h2>{!! $child->title !!}</h2>
						<p>{!! $child->caption !!}</p>
					</div>
				</div>
			</li>
		@endforeach
		@endif
	</ul> <!-- /.bxslider -->
	<div class="bx-thumbnail-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="bx-pager"></div>
				</div>
			</div>
		</div>
	</div>
</div>

@section('script_call')
	@parent
	<script>
		var $slide_section = $('.site-slider'),
				$bx_Pager = $slide_section.find('#bx-pager');
		$slide_section.find('ul.bxslider li').each(function () {
			var $item = $('<a />').appendTo($bx_Pager);
			$item.attr({
				'data-slide-index':$(this).index(),
				'href':''
			});
			if ($(this).hasClass('active')) {
				$item.addClass('active')
			}
			$item.append('<img src="'+$(this).attr('data-thumbnail-url')+'" alt="'+$(this).attr('data-thumbnail-alt')+'" />')
		});

		(function (window, $) {
			'use strict';

			// Cache document for fast access.
			var document = window.document;


			function mainSlider() {
				$('.bxslider').bxSlider({
					pagerCustom: '#bx-pager',
					mode: 'fade',
					nextText: '',
					prevText: '',
					auto:true
				});
			}

			mainSlider();



			var $links = $(".bx-wrapper .bx-controls-direction a, #bx-pager a");
			$links.click(function(){
				$(".slider-caption").removeClass('animated fadeInLeft');
				$(".slider-caption").addClass('animated fadeInLeft');
			});

			$(".bx-controls").addClass('container');
			$(".bx-next").addClass('fa fa-angle-right');
			$(".bx-prev").addClass('fa fa-angle-left');

		})(window, jQuery);
	</script>
@endsection