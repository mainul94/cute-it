<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/27/16
 * Time: 10:57 AM
 */?>
<div class="form-group">
	<label for="category">Select Category</label>
	<select class="form-control" id="category" name="category">
	</select>
</div>
<button type="button" class="btn btn-primary add_child" data-from="Category">Add</button>
@section('footer_script')
	@parent
	<script>
		getvalueForSelect2('[name=category]','categories',['slug','title'],[],'slug','title');
	</script>
@endsection