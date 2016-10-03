<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 9/29/16
 * Time: 3:13 PM
 */
?>
@extends('layouts.web')
@push('title') Category @endpush
@section('sections')
	<section id="products" class="content-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 class="section-title">{!! $category->title !!}</h1>
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
			@php $articles = $category->articles()->paginate() @endphp
			@include('web._partial._category_grid_view')
		</div> <!-- /.container -->
	</section>
@endsection