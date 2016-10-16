<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/17/16
 * Time: 12:44 AM
 */?>


<section id="pricing" style="background-color: {!! $category->bg_color !!}">
	<div class="container ">
		<div class="wpb_wrapper">
			<div class="clearfix margin_top1"></div>
			<h1>{!! $category->title !!}</h1>
			<h5>
				{!! $category->summery !!}
			</h5>
			<div class="vc_row wpb_row vc_inner vc_row-fluid">
				<div class="wpb_column vc_column_container vc_col-sm-12">
					<div class="price_wrapper">
						@foreach($category->articles as $article)
							<div class="price-item  col-sm-3">
								{!! $article->content !!}
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

