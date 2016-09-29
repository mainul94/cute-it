
<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/30/16
 * Time: 2:02 PM
 */
?>
@extends('layouts.admin')
@section('title') Media @endsection
@section('content')
	<div class="row">
		{{--Folder--}}
		{{--<div class="col-sm-2">

		</div>--}}
		{{-- // Folder--}}
		<div class="col-xs-12">
			@unless('files')
				<h2 class="text-muted">
					No Media
				</h2>
			@endunless
			@foreach($files as $file)
				<div class="col-md-55">
					<div class="thumbnail">
						<div class="image view view-first">
							<img style="width: 100%; display: block;" src="{!! $file->thumbnail_url?asset($file->thumbnail_url):asset($file->url) !!}" alt="image" />
							<div class="mask no-caption">
								<div class="tools tools-bottom">
									<a href="{!! action('MediaController@show', $file->slug) !!}" title="View"><i class="fa fa-eye"></i></a>
									<a href="{!! action('MediaController@edit', $file->slug) !!}" title="Edit"><i class="fa fa-pencil"></i></a>
									{!! Html::delete('MediaController@destroy',$file->slug) !!}
								</div>
							</div>
						</div>
						<div class="caption">
							<p><strong>{!! $file->title !!}</strong>
							</p>
							<p>{!! $file->caption !!}</p>
						</div>
					</div>
				</div>
			@endforeach
			<div class="clearfix"></div>
			{!! $files->render() !!}
		</div>
	</div>
@endsection
