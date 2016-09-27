<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/27/16
 * Time: 10:40 AM
 */?>
<div class="dd">
	<ol class="dd-list">
		<li class="dd-item" data-id="1">
			<div class="dd-handle">Item 1</div>
		</li>
		<li class="dd-item" data-id="2">
			<div class="dd-handle">Item 2</div>
		</li>
		<li class="dd-item" data-id="3">
			<div class="dd-handle">Item 3</div>
			<ol class="dd-list">
				<li class="dd-item" data-custom="true" data-class="test" data-url="https://google.com" data-id="4">
					<span class="edit_child" onclick="javascript:editChild(this)"><i class="fa fa-chevron-circle-down"></i></span>
					<div class="dd-handle">Item 4</div>
				</li>
				<li class="dd-item" data-id="5">
					<div class="dd-handle">Item 5</div>
				</li>
			</ol>
		</li>
	</ol>
</div>
