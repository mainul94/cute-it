<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/16/16
 * Time: 11:15 PM
 */
?>
<section id="blog" class="wpb_row vc_row-fluid section5 ">
	<div class="container " style="">
		<div class="col-sm-12 delay-400ms wpb_column column_container" style="animation-delay: 400ms;">
			<div class="blog_wrapper">
				<h1>{!! $category->title !!}</h1>
				<h5>
					{!! $category->summery !!}
				</h5>
				<div class="clearfix margin_top6"></div>
				@foreach($category->articles as $article)
					<div class="col-sm-4 blog-item  delay-100ms" style="animation-delay: 100ms;">
						<a class="post-thumbnail" href="{!! url($category->slug.'/'.$article->slug) !!}"> <img class="img-responsive" src="{!! url($article->feature_image) !!}" alt="{{ $article->title }}"> </a>
						<div class="cont">
							<h4 title="{!! $article->title !!}"> {!! str_limit($article->title) !!}</h4>
							<p>{!! str_limit($article->summery, 200) !!}</p> <br>
							<a class="btn btn-success" href="#"><i class="fa fa-clock-o"></i> {!! $article->created_at->diffForHumans() !!}</a> &nbsp;
							<a class="btn btn-success" href="#"><i class="fa fa-comment"></i> 3</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<div class="clear"></div>
	</div>
</section>
