@extends('layouts.web')
@push('title') Welcome @endpush
@section('sections')
	@include('layouts._partial._web._slide',['slide'=>$slide])
@endsection