<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/27/16
 * Time: 11:20 AM
 */
?>
<div class="col-xs-12">
    <label>Permissions:</label>
</div>
<div class="row">
    @foreach($permissions as $permission)
        <div class="col-sm-4 col-md-3">
            {!! Form::checkbox('permission_id[]',$permission->id, null, ['class'=>'flat']) !!} {!! $permission->name !!}
        </div>
    @endforeach
</div>
<div class="clearfix"></div>

@section('head')
    <!-- iCheck -->
    <link href="{!! url('vendors/iCheck/skins/flat/green.css') !!}" rel="stylesheet">
@endsection

@section('footer_script')
    @parent
    <!-- iCheck -->
    <script src="{!! asset('vendors/iCheck/icheck.min.js') !!}"></script>
@endsection

