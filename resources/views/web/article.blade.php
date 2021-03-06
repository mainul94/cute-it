<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/29/16
 * Time: 3:13 PM
 */
?>
@extends('layouts.web')
@push('title') {!! $article->title !!} @endpush
@section('sections')
	<div class="clearfix"></div>
	<section class="content-section">
		@if(isset($article->slide_id))
			@include('layouts._partial._web._slide',['slide'=>$article->slide])
		@endif
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="section-title text-center">{!! $article->title !!}</h4>
					<article class="article">
						<header class="text-center row" style="background-color: {{ $article->bg_color }}; color: white;">
							@if(isset($article->feature_image) && empty($article->slide_id))
								<div class="feature-image">
									<img src="{!! asset($article->feature_image) !!}" alt="{!! $article->title !!}">
								</div>
							@endif
								<span>{!! $article->created_at->format('l jS \\of M Y') !!} <em class="price">{!! $article->country?' | '.$article->country->title:'' !!}</em></span>
						</header>
						<div class="row">
							<div class="col-md-9">
								{!! $article->summery !!}
								{!! $article->content !!}
							</div>
							<div class="col-md-3" style="background-color: {{ $article->sidebar_bg_color }}">
								@include('web._partial._article_sidebar')
							</div><!-- /.col-md-3 -->
						</div>
					</article>
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section>
@endsection