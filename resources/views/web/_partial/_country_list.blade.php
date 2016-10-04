<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/4/16
 * Time: 5:44 PM
 */
?>
<div class="col-sm-4">
	@if(isset($region))
		<h3><a href="{!! url('map/'.$region->slug) !!}">{!! $region->title !!}</a></h3>
	@endif
	<ul>
		@foreach($countries as $country)
			<li>
				<h4><a href="{!! url('country/'.$country->slug) !!}">{!! $country->title !!}</a></h4>
				@if(isset($country->divisions))
					<ul>
						@foreach($country->divisions as $division)
							<li><h5><a href="{!! url('country/'.$country->slug.'/'.$division->slug) !!}">{!! $division->title !!}</a></h5></li>
						@endforeach
					</ul>
				@endif
			</li>
		@endforeach
	</ul>
</div>

