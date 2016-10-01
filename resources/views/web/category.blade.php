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
					<div class="col-md-3 col-sm-6">
						<div class="product-item">
							<div class="item-thumb">
								<span class="note"><img src="images/small_logo_1.png" alt=""></span>
								<div class="overlay">
									<div class="overlay-inner">
										<a href="#nogo" class="view-detail">Add to Cart</a>
									</div>
								</div> <!-- /.overlay -->
								@if($article->feature_image)
									<img src="{!! asset($article->feature_image) !!}" alt="">
								@endif
							</div> <!-- /.item-thumb -->
							<h3>{!! $article->title !!}</h3>
							<span>Price: <em class="text-muted">$260.00</em> - <em class="price">$180.00</em></span>
						</div> <!-- /.product-item -->
					</div> <!-- /.col-md-3 -->
				@endforeach
				<div class="clearfix"></div>
				{!! $articles->render() !!}
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section>
@endsection