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
        ///////////////////Add Child //////////
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

            var $dd_list = $('.dd-list:first');
            console.log()
            insertOrUpdateMenuChild('http://'+window.location.host+'/api/child-menu','POST',{
                'url':url,
                'title':label,
                'link_type':data,
                'menu_id': "{{ request()->route()->getParameter('menu')->id }}"
            },null,function (status, data) {
                if (status && data) {
                    $item = $('<li />').appendTo($dd_list);
                    $item.addClass('dd-item');
                    $item.attr('data-id',data.id);
                    $editButton = $('<span class="edit_child" onclick="javascript:editChild(this)">' +
                            '<i class="fa fa-chevron-circle-down"></i></span>').appendTo($item);
                    $itemHandeller = $('<div class="dd-handle"></div>').appendTo($item);
                    $itemHandeller.html(data.title);
                }
            })
        });
        //////////////// Edit Child ////////////////
        function editChild(e) {
            if ($(e).hasClass('active')) {
                $(e).removeClass('active');
                $(e).children('i.fa').removeClass('fa-chevron-circle-up').addClass('fa-chevron-circle-down');
                $(e).next('.edit-wrapper').remove();
            }else {
                $(e).addClass('active');
                $(e).children('i.fa').addClass('fa-chevron-circle-up').removeClass('fa-chevron-circle-down');
                $(e).editFormGenerate();
            }
        }
        (function ( $ ) {

            $.fn.editFormGenerate = function () {
                $list_Wrapper = this.closest('.dd-item');
                $editWrapper = $('<div />');
                $editWrapper.addClass('edit-wrapper');
                $editWrapper.append('<label> Label</label>');
                $labelInput = $('<input class="form-control" type="text" />').appendTo($editWrapper);
                $labelInput.val($list_Wrapper.children('.dd-handle:first').html());
                $editWrapper.append('<label>Class</label>');
                $classInput = $('<input class="form-control" type="text" />').appendTo($editWrapper);
                if ($list_Wrapper.attr('data-class')) {
                    $classInput.val($list_Wrapper.attr('data-class'))
                }
                if ($list_Wrapper.attr('data-custom') == "true") {
                    $editWrapper.append('<label>Url</label>');
                    $urlInput = $('<input class="form-control" type="text" />').appendTo($editWrapper);
                    if ($list_Wrapper.attr('data-url')) {
                        $urlInput.val($list_Wrapper.attr('data-url'))
                    }
                }
                $editWrapper.append('<br>');
                $saveButton = $('<button type="button" class="btn btn-primary">Save</button>').appendTo($editWrapper);
                $cancelButton = $('<button type="button" class="btn btn-warning">Cancel</button>').appendTo($editWrapper);
                $editWrapper.insertAfter(this);
                var me = this;
                $cancelButton.on('click', function () {
                    me.trigger('click');
                });

                $saveButton.on('click',function () {
                    if (typeof $urlInput === "undefined") {
                        $urlInputVal = null
                    }else {
                        $urlInputVal = $urlInput.val()
                    }
                    insertOrUpdateMenuChild('http://'+window.location.host+'/api/child-menu','PATCH',{
                        'css_class':$classInput.val(),
                        'title':$labelInput.val(),
                        'url':$urlInputVal
                    },$list_Wrapper.attr('data-id'),function (status, data) {
                        console.log([status,data])
                    })
                });
                return this;
            };

        }( jQuery ));
        
        function insertOrUpdateMenuChild(url, method, data, id, callback) {
            $.ajax({
                url:url,
                method:"post",
                data:$.extend({
                    _method:method,
                    id:id},data),
                success:function (r) {
                    if (r.success) {
                        callback('success',r.message[0])
                    }else {
                        callback('error',r)
                    }
                },
                error:function (status) {
                    callback('error',status);
                }
            })
        }

    </script>
@endsection