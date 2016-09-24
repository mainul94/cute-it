<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/24/16
 * Time: 4:44 PM
 */
?>
<div class="col-md-9">
    <div class="form-group {!! $errors->has('title')?'has-error':'' !!}">
        {!! Form::label('title','Title *',['class'=>'col-md-3 required']) !!}
        <div class="col-xs-12">
            {!! Form::text('title', null, ['class'=>'form-control col-xs-12']) !!}
            {!! $errors->first('title','<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="form-group {!! $errors->has('slug')? 'has-error':'' !!}">
        {!! Form::label('slug','Slug',['class'=>'col-md-3 required']) !!}
        <div class="col-xs-12">
            {!! Form::text('slug', null, ['class'=>'form-control col-xs-12']) !!}
            {!! $errors->first('slug','<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="form-group {!! $errors->has('description')? 'has-error':'' !!}">
        {!! Form::label('description','Description',['class'=>'col-md-3']) !!}
        <div class="col-xs-12">
            {!! Form::textarea('description', null, ['class'=>'form-control col-xs-12']) !!}
            {!! $errors->first('description','<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<div class="col-md-3">
    @include('admin.slide._form_right_side')
</div>

<div class="col-xs-12">
    {!! Form::submit('Save',['class'=>'btn btn-info pull-right']) !!}
</div>

@section('footer_script')
    @parent
    <!-- include summernote css/js-->
    <link href="{!! asset('vendors/summernote/css/summernote.css') !!}" rel="stylesheet">
    <script src="{!! asset('vendors/summernote/js/summernote.js') !!}"></script>
    <script src="{!! asset('js/panel.js') !!}"></script>
    <script>
        $('[name=description]').summernote({
            height:200
        });
    </script>
@endsection