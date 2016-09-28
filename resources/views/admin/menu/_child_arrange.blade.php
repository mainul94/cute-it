<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/27/16
 * Time: 10:40 AM
 */?>
<ol class="dd-list">
	@foreach($children as $child)
		<li class="dd-item" data-url="{{ $child->url }}" data-link-type="{{ $child->link_type }}" data-class="{{ $child->css_class }}"
			data-custom="{{ $child->link_type === "Custom"? true:false }}" data-id="{{ $child->id }}">
			<span class="edit_child" onclick="javascript:editChild(this)"><i class="fa fa-chevron-circle-down"></i></span>
			<div class="dd-handle">{{ $child->title }}</div>
			@if(isset($child->children))
				@include('admin.menu._child_arrange',['children'=>$child->children])
			@endif
		</li>
	@endforeach
</ol>
