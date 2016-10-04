<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/4/16
 * Time: 2:03 PM
 */?>
@foreach($relatedArticles as $relatedArticle)
	<div class="widget-item" style="background-color: #fff">
		<div class="col-xs-12">
			<h5>{!! $relatedArticle->title !!}</h5>
		</div>
		@if(isset($relatedArticle->feature_image))
			<div class="col-xs-12">
				<h4 class="text-center"><img class="img-responsive" src="{!! asset($relatedArticle->feature_image) !!}" alt="{!! $relatedArticle->title !!}"></h4>
				<p>{!! $relatedArticle->feature_caption !!}</p>
			</div>
		@endif
		<div class="col-xs-12">
			<span>{!! $relatedArticle->created_at->format('l jS \\of M Y') !!} <em class="price">{!! $relatedArticle->country?' | '.$relatedArticle->country->title:'' !!}</em></span>
			<hr>
		</div>
		<div class="col-xs-12">
			<p>{!! $relatedArticle->summery !!}</p>
		</div>
		<div class="col-xs-12 text-center">
			@php $category = $relatedArticle->categories->first() @endphp
			<a href="{{ url($category->slug.'/'.$relatedArticle->slug) }}" class="btn btn-info">Read more</a>
		</div>
	</div>
@endforeach
