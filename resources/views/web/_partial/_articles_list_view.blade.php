<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/4/16
 * Time: 5:13 PM
 */
?>
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
		@if(empty($category))
			@php $category = $article->categories->first() @endphp
		@endif
		@if($article->feature_image)
			<div class="col-md-4">
				<img class="feature-image img-responsive" style="border-color: {{ $article->bg_color }};" src="{!! asset($article->feature_image) !!}" alt="{{ $article->title }}">
			</div>
		@endif
		<div class="col-md-{{ empty($article->feature_image)?12:8 }}">
			<h3>{!! $article->title !!}</h3>
			<div class="text-left">{!! str_limit($article->summery,250) !!}</div>
			<span>{!! $article->created_at->format('l jS \\of M Y') !!}<em class="price">{!! $article->country?' | '.$article->country->title:'' !!}</em></span>
			<p class="text-center"><a href="{{ url($category->slug.'/'.$article->slug) }}" class="btn btn-info">View Details</a></p>
		</div>

	@endforeach

	<div class="clearfix"></div>
	{!! $articles->render() !!}
</div> <!-- /.row -->

