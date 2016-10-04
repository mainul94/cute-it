<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/29/16
 * Time: 3:13 PM
 */
?>
@extends('layouts.web')
@push('title') Article @endpush
@section('sections')
	<div class="clearfix"></div>
	<section class="content-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="section-title text-center">{!! $page->title !!}</h4>
					<article class="article">
						<div class="row">
							<div class="col-md-12">
								{!! $page->content !!}
							</div>
						</div>
					</article>
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section>
@endsection