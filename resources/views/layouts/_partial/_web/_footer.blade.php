<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/29/16
 * Time: 3:39 PM
 */
?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-sm-6">
			<div class="row">
				<nav class="navbar footer-nav">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer_menu" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="footer_menu">
						<ul class="nav navbar-nav">
							@foreach($footer_menus as $menu)
								<li class="{{ !empty($menu->url)?(preg_match('#^'.$menu->url.'?#i', $current_url)===1?'active':''):'#' }}">
									<a href="{{ $menu->url }}">{{ $menu->title }}</a>
								</li>
							@endforeach
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
		</div> <!-- /.col-md-6 -->
		<div class="col-md-4 col-sm-6">
			<ul class="social">
				@php
					$facebook = setting('facebook_link');
					$twitter = setting('twitter_link');
					$google_plus = setting('google_plus_link');
					$youtube = setting('youtube_link');
					$linkdin = setting('linkdin_link');
					$pinterest = setting('pinterest_link');
				@endphp
				@if(!empty($facebook->property_values))
					<li><a href="{{ $facebook->property_values }}" class="fa fa-facebook"></a></li>
				@endif
				@if(!empty($twitter->property_values))
					<li><a href="{{ $twitter->property_values }}" class="fa fa-twitter"></a></li>
				@endif
				@if(!empty($google_plus->property_values))
					<li><a href="{{ $google_plus->property_values }}" class="fa fa-google-plus"></a></li>
				@endif
				@if(!empty($youtube->property_values))
					<li><a href="{{ $youtube->property_values }}" class="fa fa-youtube"></a></li>
				@endif
				@if(!empty($linkdin->property_values))
					<li><a href="{{ $linkdin->property_values }}" class="fa fa-linkedin"></a></li>
				@endif
				@if(!empty($pinterest->property_values))
					<li><a href="{{ $pinterest->property_values }}" class="fa fa-pinterest"></a></li>
				@endif
			</ul>
		</div> <!-- /.col-md-6 -->
	</div> <!-- /.row -->
</div> <!-- /.container -->
<section class="container-flude">
	<div class="container">

		<div class="col-xs-12">
			<span id="copyright">
				Copyright &copy; 2016 <a href="{{ url('') }}"><strong>UHSSP</strong></a>
			</span>
		</div>
	</div>
</section>
