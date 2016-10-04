<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/4/16
 * Time: 1:59 PM
 */?>
@foreach($widgets as $widget)
	<div class="widget-item" style="background-color: {{ empty($widget->bg_color)?'#fff':$widget->bg_color }}">
		<div class="col-xs-12">
			<h4 class="text-center">{!! $widget->title !!}</h4>
		</div>
		@if(isset($widget->imageMedia))
			<div class="col-xs-12">
				<h4 class="text-center"><img class="img-responsive" src="{!! asset($widget->imageMedia->thumbnail_url) !!}" alt="{!! $widget->title !!}"></h4>
				<p>{!! $widget->feature_caption !!}</p>
			</div>
		@endif
		<div class="col-xs-12">
			<p>{!! $widget->summery !!}</p>
		</div>
	</div>
@endforeach
