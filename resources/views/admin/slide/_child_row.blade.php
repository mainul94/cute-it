<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/24/16
 * Time: 3:53 PM
 */?>
<div class="col-xs-12 slide_child_row">
	<div class="row">
		@if(!empty($row))
			{!! Form::hidden('ch_id[]',$row->id) !!}
		@endif
		<div class="col-sm-6 pull-right">
			<div class="form-group {!! $errors->has('image')?'has-error':'' !!}">
				<div class="col-xs-12">
					{{--<button class="btn btn-sm" type="button" id="image_brows">Brows</button>--}}
					<div class="image_thumbnail">{!! !empty($row)?'<img class="img-responsive img-thumbnail" src="'.asset($row->imageMedia->thumbnail_url).'" >':'' !!}</div>
					<div class="input-group">
						{!! Form::text('image[]', empty($row->imageMedia)?null:$row->imageMedia->id, ['class'=>'form-control col-md-7 col-xs-12']) !!}
						<a href="#" class="input-group-addon image_brows" data-toggle="tooltip"
						   data-placement="bottom" title="Brows">Brows</a>
					</div>
					{!! Form::text('ch_feature_caption[]', empty($row)?null:$row->feature_caption, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Caption']) !!}
					{!! $errors->first('image','<span class="help-block">:message</span>') !!}
				</div>
				{!! Form::label('image','Image',['class'=>'col-xs-12 required']) !!}
				@if(empty($row))
					<button class="btn btn-danger" type="button" onclick="javascript:$(this).parents('.slide_child_row').remove()">Remove Slide</button>
				@else
					<button class="btn btn-danger" type="button" onclick="javascript:deleteDataByAPI(this, '/api/delete', 'slide_children',
						'{{ $row->id }}', $(this).parents('.slide_child_row'))">Remove Slide</button>
				@endif
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group {!! $errors->has('ch_title')?'has-error':'' !!}">
				{!! Form::label('ch_title','Title *',['class'=>'col-md-3 required']) !!}
				<div class="col-xs-12">
					{!! Form::text('ch_title[]', empty($row)?null:$row->title, ['class'=>'form-control col-xs-12']) !!}
					{!! $errors->first('ch_title','<span class="help-block">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {!! $errors->has('ch_caption')?'has-error':'' !!}">
				{!! Form::label('ch_caption','Caption',['class'=>'col-md-3 required']) !!}
				<div class="col-xs-12">
					{!! Form::textarea('ch_caption[]', empty($row)?null:$row->caption, ['class'=>'form-control col-xs-12']) !!}
					{!! $errors->first('ch_caption','<span class="help-block">:message</span>') !!}
				</div>
			</div>
			<div class="form-group {!! $errors->has('ch_bg_color')? 'has-error':'' !!}">
				{!! Form::label('ch_bg_color','Background Color',['class'=>'col-xs-12 required']) !!}
				<div class="col-xs-12">
					<div class="input-group bg_color colorpicker-element">
						@php $bg_color = !empty($child) && $child->bg_color ? $child->bg_color: '#55c58f' @endphp
						{!! Form::text('ch_bg_color[]', $bg_color, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'#1820d9']) !!}
						<span class="input-group-addon"><i></i></span>
					</div>
					{!! $errors->first('ch_bg_color','<span class="help-block">:message</span>') !!}
				</div>
			</div>


			<div class="form-group {!! $errors->has('style')? 'has-error':'' !!}">
				{!! Form::label('style','Style',['class'=>'col-md-3 required']) !!}
				<div class="col-xs-12">
					{!! Form::select('style[]',['Default'=>'Default'], empty($row)?null:$row->style, ['class'=>'form-control col-md-7 col-xs-12']) !!}
					{!! $errors->first('style','<span class="help-block">:message</span>') !!}
				</div>
			</div>

		</div>
	</div>
</div>