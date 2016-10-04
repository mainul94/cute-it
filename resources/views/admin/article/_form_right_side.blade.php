<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/24/16
 * Time: 4:44 PM
 */
?>

<div class="col-xs-12">
	{!! Form::submit('Save',['class'=>'btn btn-info pull-right']) !!}
</div>
<div class="form-group {!! $errors->has('is_feature')? 'has-error':'' !!}">
	<div class="col-xs-12">
		{!! Form::checkbox('is_feature',1,null) !!}
		{!! Form::label('is_feature','Is Feature') !!}
		{!! $errors->first('is_feature','<span class="help-block">:message</span>') !!}
	</div>
</div>


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

<div class="form-group {!! $errors->has('sidebar_bg_color')? 'has-error':'' !!}">
    {!! Form::label('sidebar_bg_color','Slide Background Color',['class'=>'col-xs-12 required']) !!}
    <div class="col-xs-12">
		<div class="input-group sidebar_bg_color colorpicker-element">
			@php $sidebar_bg_color = !empty($id) && $id->sidebar_bg_color ? $id->sidebar_bg_color: '#55c58f' @endphp
			{!! Form::text('sidebar_bg_color', $sidebar_bg_color, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'#1820d9']) !!}
			<span class="input-group-addon"><i></i></span>
		</div>
		{!! $errors->first('sidebar_bg_color','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('slide_id')? 'has-error':'' !!}">
    {!! Form::label('slide_id','Slide',['class'=>'control-label col-md-3 required']) !!}
    <div class="col-xs-12">
		@php $slides = !empty($id) && $id->slide ? $id->slide->lists('title','id') : [] @endphp
        {!! Form::select('slide_id',$slides, null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('slide_id','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('slide_position')? 'has-error':'' !!}">
    {!! Form::label('slide_position','Slide Positon',['class'=>'control-label col-md-3 required']) !!}
    <div class="col-xs-12">
        {!! Form::select('slide_position',['Top'=>'Top', 'Bottom'=>'Bottom'], null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('slide_position','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('country_id')? 'has-error':'' !!}">
    {!! Form::label('country_id','Country',['class'=>'control-label col-md-3 required']) !!}
    <div class="col-xs-12">
	    @php $countries = !empty($id) && $id->country ? $id->country->lists('title','id') : [] @endphp
        {!! Form::select('country_id',$countries, null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('country_id','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('division_id')? 'has-error':'' !!}">
    {!! Form::label('division_id','Division',['class'=>'control-label col-md-3 required']) !!}
    <div class="col-xs-12">
	    @php $divisions = !empty($id) && $id->division ? $id->division->lists('title','id') : [] @endphp
        {!! Form::select('division_id',$divisions, null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('division_id','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('template')? 'has-error':'' !!}">
    {!! Form::label('template','Template',['class'=>'control-label col-md-3 required']) !!}
    <div class="col-xs-12">
	    @inject('article','\App\Article')
        {!! Form::select('template',$article->templates, null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
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
		$('.sidebar_bg_color').colorpicker();
		getvalueForSelect2('[name=slide_id]','slides',['id','title'],[],'id','title');
		getvalueForSelect2('[name=country_id]','countries',['id','title'],[],'id','title');
		getvalueForSelect2('[name=division_id]','divisions',['id','title'],[],'id','title');


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