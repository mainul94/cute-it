<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/24/16
 * Time: 3:53 PM
 */?>
<div class="row slide_child_row_wrapper">
	@if(!empty($id))
		@forelse($id->slideChildren as $child)
			@include('admin.slide._child_row',['row' => $child])
		@empty
				@include('admin.slide._child_row')
		@endforelse
	@endif
</div>
<div class="row">
	<div class="col-xs-12">
		<button type="button" class="btn btn-info" id="slide_child_add">Add New</button>
	</div>
</div>
@section('footer_script')
	@parent
	<script>
		$('#slide_child_add').on('click', function () {
			var $eliment = $('.slide_child_row:last').clone();
			$eliment.appendTo('.slide_child_row_wrapper');
			$eliment.find('[name^=ch_title]').val(null);
			$eliment.find('[name^=image]').val(null);
			$eliment.find('[name^=ch_feature_caption]').val(null);
			$eliment.find('[name^=ch_caption]').val(null);
			$eliment.find('[name^=ch_bg_color]').val(null);
			$eliment.find('[name^=style]').val(null);
			$eliment.find('.image_thumbnail').html('');
			$eliment.find('.image_brows').first().FileManager({
				baseUrl:"{{ url('/') }}",
				get_url:"{{ action('MediaController@index') }}",
				target: $eliment.find('[name^=image]')
			},function (el, val) {
				var $wrrap = $eliment.find('.image_thumbnail').html('');
				if (typeof  val === 'string') {
					$wrrap.append('<img class="img-responsive img-thumbnail" src="'+val+'" >');
				}else {
					$.each(val, function (k, v) {
						$wrrap.append('<img class="img-responsive img-thumbnail" src="'+v+'" >');
					});
				}
			});
		});
	</script>
@endsection
