<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/24/16
 * Time: 4:44 PM
 */
?>
<div class="form-group {!! $errors->has('property')?'has-error':'' !!}">
    {!! Form::label('property','Property *',['class'=>'control-label col-md-3 required']) !!}
    <div class="col-md-7">
        {!! Form::text('property', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('property','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('s_group')?'has-error':'' !!}">
    {!! Form::label('s_group','Group',['class'=>'control-label col-md-3 required']) !!}
    <div class="col-md-7">
        {!! Form::text('s_group', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('s_group','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('property_values')? 'has-error':'' !!}">
    {!! Form::label('property_values','Value',['class'=>'control-label col-md-3']) !!}
    <div class="col-md-9">
        {!! Form::textarea('property_values', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('property_values','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="col-xs-12">
    {!! Form::submit('Save',['class'=>'btn btn-info pull-right']) !!}
</div>