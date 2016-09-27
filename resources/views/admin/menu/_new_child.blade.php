<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/27/16
 * Time: 10:41 AM
 */
?>
<div>
	<h2>Add New Menu From</h2>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#category_tab" aria-controls="category_tab" role="tab" data-toggle="tab">Category</a></li>
		<li role="presentation"><a href="#page_tab" aria-controls="page_tab" role="tab" data-toggle="tab">Page</a></li>
		<li role="presentation"><a href="#article_tab" aria-controls="article_tab" role="tab" data-toggle="tab">Article</a></li>
		<li role="presentation"><a href="#custom_tab" aria-controls="custom_tab" role="tab" data-toggle="tab">Custom</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="category_tab">
			@include('admin.menu._new_from_category')
		</div>
		<div role="tabpanel" class="tab-pane" id="page_tab">
			@include('admin.menu._new_from_page')
		</div>
		<div role="tabpanel" class="tab-pane" id="article_tab">
			@include('admin.menu._new_from_article')
		</div>
		<div role="tabpanel" class="tab-pane" id="custom_tab">
			@include('admin.menu._new_from_custom')
		</div>
	</div>
</div>
