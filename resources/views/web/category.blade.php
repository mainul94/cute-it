<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/29/16
 * Time: 3:13 PM
 */
?>
@extends('layouts.web')
@push('title') Category @endpush
@section('sections')
	<section id="products" class="content-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 class="section-title">{!! $category->title !!}</h1>
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
			@php $articles = $category->articles()->paginate() @endphp
			<div class="row">
				@foreach($articles as $article)
					<div class="col-md-4">
						<div class="product-item">
							<div class="item-thumb">
								<span class="note"><img src="images/small_logo_1.png" alt=""></span>
								<div class="overlay" style="background-color: {{ $article->bg_color }}; border-color: {{ $article->bg_color }};">
									<div class="overlay-inner">
										<div class="text-left">{!! str_limit($article->summery,250) !!}</div>
										<a href="{{ url($category->slug.'/'.$article->slug) }}" class="btn btn-info">View Details</a>
									</div>
								</div> <!-- /.overlay -->
								@if($article->feature_image)
									<img class="feature-image" style="border-color: {{ $article->bg_color }};" src="{!! asset($article->feature_image) !!}" alt="">
								@endif
								<h3>{!! $article->title !!}</h3>
								<span>{!! $article->created_at->format('l jS \\of M Y') !!} | <em class="price">Bangladesh{{-- Todo this get my Dynamicly from country --}}</em></span>
							</div> <!-- /.item-thumb -->
						</div> <!-- /.product-item -->
					</div> <!-- /.col-md-3 -->
				@endforeach
				<div class="clearfix"></div>
				{!! $articles->render() !!}
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section>
@endsection