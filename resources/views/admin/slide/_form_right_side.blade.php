<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/24/16
 * Time: 4:44 PM
 */
?>
<div class="form-group {!! $errors->has('feature_image')?'has-error':'' !!}">
	<div class="col-xs-12">
		{{--<button class="btn btn-sm" type="button" id="feature_image_brows">Brows</button>--}}
		<div id="feature_thumbnail">{!! !empty($id)?'<img class="img-responsive img-thumbnail" src="'.asset($id->feature_image).'" >':'' !!}</div>
		<div class="input-group">
			{!! Form::text('feature_image', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
			<a href="#" class="input-group-addon" id="feature_image_brows"  data-toggle="tooltip"
			   data-placement="bottom" title="Brows">Brows</a>
		</div>
		{!! Form::text('feature_caption', null, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Caption']) !!}
		{!! $errors->first('feature_image','<span class="help-block">:message</span>') !!}
	</div>
	{!! Form::label('feature_image','Feature Image',['class'=>'col-xs-12 required']) !!}
</div>

<div class="form-group {!! $errors->has('bg_color')? 'has-error':'' !!}">
    {!! Form::label('bg_color','Background Color',['class'=>'col-xs-12 required']) !!}
    <div class="col-xs-12">
		<div class="input-group bg_color colorpicker-element">
			@php $bg_color = !empty($id) && $id->bg_color ? $id->bg_color: '#55c58f' @endphp
			{!! Form::text('bg_color', $bg_color, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'#1820d9']) !!}
			<span class="input-group-addon"><i></i></span>
		</div>
		{!! $errors->first('bg_color','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('template')? 'has-error':'' !!}">
    {!! Form::label('template','Template',['class'=>'control-label col-md-3 required']) !!}
    <div class="col-xs-12">
        {!! Form::select('template',['Default'=>'Default'], null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('template','<span class="help-block">:message</span>') !!}
    </div>
</div>
@section('head')
	@parent<!-- Bootstrap Colorpicker -->
	<link href="{!! asset('vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}" rel="stylesheet">
@endsection

@section('footer_script')
	@parent
	<!-- Bootstrap Colorpicker -->
	<script src="{!! asset('vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') !!}"></script>
	<script>
		$('.bg_color').colorpicker();
		var featureImage = $("#feature_image_brows").FileManager({
			baseUrl:"{{ url('/') }}",
			get_url:"{{ action('MediaController@index') }}",
			target: '[name=feature_image]',
			multiple:true
		},function (el, val) {
			var $wrrap = $('#feature_thumbnail').html('');
			if (typeof  val === 'string') {
				$wrrap.append('<img class="img-responsive img-thumbnail" src="'+val+'" >');
			}else {
				$.each(val, function (k, v) {
					$wrrap.append('<img class="img-responsive img-thumbnail" src="'+v+'" >');
				});
			}
		});
	</script>
@endsection