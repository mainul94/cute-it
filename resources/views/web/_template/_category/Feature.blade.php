<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/14/16
 * Time: 7:26 PM
 */?>
<section class="feature">
	<div class="container">
		@foreach($category->articles as $article)
			<div class="feature-item col-sm-3">
				<div class="circle">
					@if(starts_with($article->feature_image, 'fa'))
						<i class="{!! $article->feature_image !!}"></i>
						@else
						<img src="{!! url($article->feature_image) !!}" alt="{!! $article->title !!}" class="img-responsive">
					@endif
				</div>
				{{--Icon or Image--}}
				<strong>{!! $article->title !!}</strong>
				<div>{!! $article->summery !!}</div>
			</div>
		@endforeach
	</div>
</section>
