<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/3/16
 * Time: 1:39 PM
 */
?>
<div class="row">
	@foreach($articles as $article)
		<div class="col-md-4">
			<div class="product-item">
				<div class="item-thumb">
					{{--<span class="note"><img src="images/small_logo_1.png" alt=""></span>--}}
					<div class="overlay" style="background-color: {{ $article->bg_color }}; border-color: {{ $article->bg_color }};">
						<div class="overlay-inner">
							<div class="text-left">{!! str_limit($article->summery,250) !!}</div>
							<a href="{{ url($category->slug.'/'.$article->slug) }}" class="btn btn-info">View Details</a>
						</div>
					</div>
					@if($article->feature_image)
						<img class="feature-image" style="border-color: {{ $article->bg_color }};" src="{!! asset($article->feature_image) !!}" alt="{{ $article->title }}">
					@endif
					<h3>{!! $article->title !!}</h3>
					<span>{!! $article->created_at->format('l jS \\of M Y') !!}<em class="price">{!! $article->country?' | '.$article->country->title:'' !!}</em></span>
				</div>
			</div>
		</div>
	@endforeach
	<div class="clearfix"></div>
	<div class="col-xs-12">
		{!! $articles->render() !!}
	</div>
</div>
