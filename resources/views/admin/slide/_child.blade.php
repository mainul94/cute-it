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
		$('.slide_child_row').each(function (key, el){
			$el = $(el);
			$el.find('.image_brows').FileManager({
					baseUrl:"{{ url('/') }}",
					get_url:"{{ action('MediaController@index') }}",
					target: $el.find('[name^=image]'),
					multiple_val_attr:'data-image-id'
				},function (el, val) {
					$el.find('[name^=image]').setupThumbnail($el.find('.image_thumbnail'),val,true);
				});
		});
		//////////////////////////////////////COPy/////////////
		$('#slide_child_add').on('click', function () {
			if ($('.slide_child_row:last').length <1) {
				window.location.reload()
			}
			var $eliment = $('.slide_child_row:last').clone();
			$eliment.appendTo('.slide_child_row_wrapper');
			$eliment.find('[name^=ch_title]').val(null);
			$eliment.find('[name^=image]').val(null);
			$eliment.find('[name^=ch_feature_caption]').val(null);
			$eliment.find('[name^=ch_caption]').val(null);
			$eliment.find('[name^=ch_bg_color]').val(null);
			$eliment.find('[name^=ch_id]').remove();
			$eliment.find('.image_thumbnail').html('');
			$eliment.find('.image_brows').first().FileManager({
				baseUrl:"{{ url('/') }}",
				get_url:"{{ action('MediaController@index') }}",
				target: $eliment.find('[name^=image]'),
				multiple_val_attr:'data-image-id'
			},function (el, val) {
				$eliment.find('[name^=image]').setupThumbnail($eliment.find('.image_thumbnail'),val,true);
			});
		});
	</script>
@endsection