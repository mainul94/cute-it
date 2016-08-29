<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/24/16
 * Time: 4:44 PM
 */
?>
<div class="form-group {!! $errors->has('region_id')?'has-error':'' !!}">
    {!! Form::label('region_id','Region *',['class'=>'control-label col-md-3 required']) !!}
    <div class="col-md-7">
        @php $regions = !empty($id)?[]:[] @endphp
        {!! Form::select('region_id',$regions, null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('region_id','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('title')?'has-error':'' !!}">
    {!! Form::label('title','Country *',['class'=>'control-label col-md-3 required']) !!}
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

<div class="form-group {!! $errors->has('description')? 'has-error':'' !!}">
    {!! Form::label('description','Description',['class'=>'control-label col-md-3']) !!}
    <div class="col-md-9">
        {!! Form::textarea('description', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
        {!! $errors->first('description','<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="col-xs-12">
    {!! Form::submit('Save',['class'=>'btn btn-info pull-right']) !!}
</div>

@section('footer_script')
    <!-- include summernote css/js-->
    <link href="{!! asset('vendors/summernote/css/summernote.css') !!}" rel="stylesheet">
    <script src="{!! asset('vendors/summernote/js/summernote.js') !!}"></script>
    <script>
        $('[name=description]').summernote({
            height:200
        });
    </script>
@endsection