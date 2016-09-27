<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/27/16
 * Time: 10:57 AM
 */?>
<div class="form-group">
	<label for="article">Select Article</label>
	<br>
	<select class="form-control" id="article" name="article">
	</select>
</div>
<button type="button" class="btn btn-primary add_child" data-from="Article">Add</button>
@section('footer_script')
	@parent
	<script>
		getvalueForSelect2('[name=article]','articles',['slug','title'],[],'slug','title');
		$('.select2.select2-container').css('width','100%');
	</script>
@endsection