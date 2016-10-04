<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/3/16
 * Time: 3:50 PM
 */
?>
@if(!empty($row))
	{!! Form::hidden('wd_id[]',$row->id) !!}
@endif

<div class="widget_slide_row col-xs-12">
	<div class="col-sm-6">
		<div class="form-group {!! $errors->has('wd_title')?'has-error':'' !!}">
			{!! Form::label('wd_title','Title *',['class'=>'required']) !!}
			<div class="col-xs-12">
				{!! Form::text('wd_title[]', empty($row)?null:$row->title, ['class'=>'form-control col-xs-12']) !!}
				{!! $errors->first('wd_title','<span class="help-block">:message</span>') !!}
			</div>
		</div>
	</div>
	{{--<div class="col-sm-6">
		<div class="form-group {!! $errors->has('wd_slug')? 'has-error':'' !!}">
			{!! Form::label('wd_slug','Slug',['class'=>'required']) !!}
			<div class="col-xs-12">
				{!! Form::text('wd_slug[]', empty($row)?null:$row->slug, ['class'=>'form-control col-xs-12']) !!}
				{!! $errors->first('wd_slug','<span class="help-block">:message</span>') !!}
			</div>
		</div>
	</div>--}}
	<div class="col-sm-6">
		<div class="form-group {!! $errors->has('wd_bg_color')? 'has-error':'' !!}">
			{!! Form::label('wd_bg_color','Background Color',['class'=>'required']) !!}
			<div class="col-xs-12">
				@php $bg_color = !empty($row) && $row->bg_color ? $row->bg_color: '#55c58f' @endphp
				{!! Form::text('wd_bg_color[]', $bg_color, ['class'=>'form-control col-xs-12']) !!}
				{!! $errors->first('wd_bg_color','<span class="help-block">:message</span>') !!}
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group {!! $errors->has('wd_summery')? 'has-error':'' !!}">
			{!! Form::label('wd_summery','Summery',['class'=>'required']) !!}
			<div class="col-xs-12">
				{!! Form::textarea('wd_summery[]', empty($row)?null:$row->summery, ['class'=>'form-control col-xs-12']) !!}
				{!! $errors->first('wd_summery','<span class="help-block">:message</span>') !!}
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group {!! $errors->has('wd_feature_image')?'has-error':'' !!}">
			<div class="col-xs-12">
				<div class="image_thumbnail" id="image_thumbnail">{!! !empty($row->imageMedia)?'<img class="img-responsive img-thumbnail" src="'.asset($row->imageMedia->thumbnail_url).'" >':'' !!}</div>
				<div class="input-group">
					{!! Form::text('wd_feature_image[]', empty($row->imageMedia)?null:$row->imageMedia->id, ['class'=>'form-control col-md-7 col-xs-12']) !!}
					<a href="#" class="input-group-addon image_brows" id="wd_feature_image_brows"  data-toggle="tooltip"
					   data-placement="bottom" title="Brows">Brows</a>
				</div>
				{!! Form::text('wd_feature_caption[]', empty($row)?null:$row->feature_caption, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Caption']) !!}
				{!! $errors->first('wd_feature_image','<span class="help-block">:message</span>') !!}
			</div>
			{!! Form::label('wd_feature_image','Feature Image',['class'=>'col-xs-12 required']) !!}
		</div>
	</div>
	<div class="col-sm-6">
		<button class="btn btn-danger" type="button" onclick="javascript:$(this).parents('.widget_slide_row').remove()">Remove Widget</button>
	</div>
	<div class="clearfix"></div>
	<div class="divider-dashed"></div>
</div>
