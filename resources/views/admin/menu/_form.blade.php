<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/24/16
 * Time: 4:44 PM
 */
?>
<div class="form-group {!! $errors->has('title')?'has-error':'' !!}">
    {!! Form::label('title','Title *',['class'=>'control-label col-md-3 required']) !!}
    <div class="col-md-7">
        {!! Form::text('title', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('title','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('slug')? 'has-error':'' !!}">
    {!! Form::label('slug','Slug *',['class'=>'control-label col-md-3 required']) !!}
    <div class="col-md-7">
        {!! Form::text('slug', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('slug','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="col-xs-12">
    {!! Form::submit('Save',['class'=>'btn btn-info pull-right']) !!}
</div>

@section('footer_script')

@endsection