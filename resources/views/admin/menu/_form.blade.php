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

<div class="col-sm-6">
    @include('admin.menu._child_arrange')
</div>
<div class="col-sm-6">
    @include('admin.menu._new_child')
</div>

@section('footer_script')
    @parent
    <script src="{{ asset('js/jquery.nestable.js') }}"></script>
    <script src="{{ asset('js/panel.js') }}"></script>
    <script>
        $children = $('.dd').nestable({

        });
        $('button.add_child').on('click',function () {
            var data = $(this).data('from');
            var url, label;
            if (data == "Custom") {
                label = $('input[name=custom_label]').val();
                url = "{{  url('') }}" +'/' + $('input[name=custom_url]').val();
            } else if (data == "Category") {
                label = $('select[name=category] option:selected').text();
                url = "{{  url('') }}" +'/' + $('select[name=category]').val();
            } else if (data == "Article") {
                label = $('select[name=article] option:selected').text();
                url = "{{  url('') }}" +'/' + $('select[name=article]').val();
            } else if (data == "Page") {
                label = $('select[name=page] option:selected').text();
                url = "{{  url('') }}" +'/' + $('select[name=page]').val();
            }

            var $dd_list = $('.dd-list');
        });
    </script>
@endsection