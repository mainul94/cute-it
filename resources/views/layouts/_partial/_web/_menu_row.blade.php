<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/29/16
 * Time: 11:37 AM
 */?>
<li class="{{ $has_child?'dropdown':'' and preg_match('#^'.$menu->url.'?#i', $current_url)===1?'active':'' }}">
	<a class="{{ $has_child?'dropdown-toggle':'' and  $menu->css_class }}"
	   {{ $has_child?'data-toggle=dropdown role=button aria-haspopup=true aria-expanded=false':'' }}
	   href="{{ $menu->url }}">{{ $menu->title }} @if($has_child) <span class="caret"></span>@endif</a>
	@if($has_child)
		<ul class="dropdown-menu">
			@foreach($menu->children as $menu)
				@include('layouts._partial._web._menu_row',['menu'=>$menu, 'has_child'=>$menu->children->count()])
			@endforeach
		</ul>
	@endif
</li>
