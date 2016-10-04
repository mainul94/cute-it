<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/3/16
 * Time: 3:45 PM
 */
?>
<div class="row widget_slide_row_wrapper">
	@if(!empty($id))
		@forelse($id->widgets as $widget)
			@include('admin.article._widget_row',['row' => $widget])
		@empty
			@include('admin.article._widget_row')
		@endforelse
	@endif
</div>
<div class="row">
	<div class="col-xs-12">
		<button type="button" class="btn btn-info" id="widget_slide_add">Add New</button>
	</div>
</div>

@section('footer_script')
	@parent
	<!-- Bootstrap Colorpicker -->
	<script src="{!! asset('vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') !!}"></script>
	<script>
		$('.widget_slide_row').each(function (key, el){
			$el = $(el);
			$el.find('.image_brows').FileManager({
				baseUrl:"{{ url('/') }}",
				get_url:"{{ action('MediaController@index') }}",
				target: $el.find('[name^=wd_feature_image]'),
				multiple_val_attr:'data-image-id'
			},function (el, val) {
				$el.find('[name^=wd_feature_image]').setupThumbnail($el.find('.image_thumbnail'),val,true);
			});
			$el.find('[name^=wd_summery]').summernote({
				height:100
			});
//			$el.find('[name^=wd_bg_color]').colorpicker();
		});
		//////////////////////////////////////COPy/////////////
		$('#widget_slide_add').on('click', function () {
			if ($('.widget_slide_row:last').length <1) {
				window.location.reload()
			}
			var $eliment = $('.widget_slide_row:last').clone();
			$eliment.appendTo('.widget_slide_row_wrapper');
			$eliment.find('[name^=wd_title]').val(null);
			$eliment.find('[name^=wd_feature_image]').val(null);
			$eliment.find('[name^=wd_feature_caption]').val(null);
			$eliment.find('[name^=wd_caption]').val(null);
//			$eliment.find('[name^=wd_bg_color]').val(null);
			$eliment.find('[name^=wd_id]').remove();
			$eliment.find('.image_thumbnail').html('');
			$eliment.find('.note-editor').remove();
			$eliment.find('[name^=wd_summery]').html('').summernote({
				height:100
			});
			$eliment.find('.image_brows').first().FileManager({
				baseUrl:"{{ url('/') }}",
				get_url:"{{ action('MediaController@index') }}",
				target: $eliment.find('[name^=wd_feature_image]'),
				multiple_val_attr:'data-image-id'
			},function (el, val) {
				$eliment.find('[name^=wd_feature_image]').setupThumbnail($eliment.find('.image_thumbnail'),val,true);
			});
		});
	</script>
@endsection