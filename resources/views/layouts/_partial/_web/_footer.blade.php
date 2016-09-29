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
                    <span id="copyright">
                    	Copyright &copy; 2014 <a href="#">Company Name</a>
                    </span>
			<nav class="navbar navbar-inverse navbar-static-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary_menu" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="primary_menu">
						<ul class="nav navbar-nav">
							@foreach($footer_menus as $menu)
								<li class="{{ preg_match('#^'.$menu->url.'?#i', $current_url)===1?'active':'' }}">
									<a href="{{ $menu->url }}">{{ $menu->title }}</a>
								</li>
							@endforeach
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div> <!-- /.col-md-6 -->
		<div class="col-md-4 col-sm-6">
			<ul class="social">
				<li><a href="#" class="fa fa-facebook"></a></li>
				<li><a href="#" class="fa fa-twitter"></a></li>
				<li><a href="#" class="fa fa-instagram"></a></li>
				<li><a href="#" class="fa fa-linkedin"></a></li>
				<li><a href="#" class="fa fa-rss"></a></li>
			</ul>
		</div> <!-- /.col-md-6 -->
	</div> <!-- /.row -->
</div> <!-- /.container -->
