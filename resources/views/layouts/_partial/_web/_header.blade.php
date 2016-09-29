<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/29/16
 * Time: 10:19 AM
 */?>
<div class="site-header">
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary_menu" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<img alt="Brand" src="{{ asset('images/logo.png') }}">
				</a>
			</div>
			<div class="collapse navbar-collapse" id="primary_menu">
				<ul class="nav navbar-nav navbar-right">
					@foreach($menus as $menu)
						@include('layouts._partial._web._menu_row',['menu'=>$menu, 'has_child'=>$menu->children->count()])
					@endforeach
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</div> <!-- /.site-header -->
