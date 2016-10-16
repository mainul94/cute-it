<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/14/16
 * Time: 7:27 PM
 */?>

<section class="portfolio" style="background-color: {{ $category->bg_color }}">
	<div class="container">
		<h3>{!! $category->title !!}</h3>
		<div class="col-xs-12">
			{!! $category->summery !!}
		</div>
		<div class="filters"></div> {{-- Todo Need add leater --}}
		<div class="portfolio-main three">
		<ul>
		@foreach($category->articles as $article)
			<li class="portfolio-item portfolio-item photography-category web-design-category " style="display: block;">
				<div class="portfolio-item-wrapper effVisible"><div class="portfolio-image">
						<img class="img-responsive" src="{!! url($article->feature_image) !!}" alt="{{ $article->title }}"></div>
					<a href="" class="portfolio-caption-wrap">
						<div class="portfolio-caption">
							<div class="portfolio-caption-body">
								<div class="portfolio-caption-title">{{ $article->title }}</div>
								<div class="portfolio-caption-desc">{{ $article->summery }}</div>
							</div>
						</div>
					</a>
				</div>
				<a href="http://king-theme.com/preview/hoxa/wp-content/uploads/2015/06/portfolio-img1.jpg" title="To-Do Dashboard" class="btn linkfr view-large lightbox" rel="lb[portfolio]"> <i class="fa fa-search"></i> </a>
			</li>
		@endforeach
		</ul>

		</div>
	</div>
</section>
