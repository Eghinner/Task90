@extends('plantilla')
@section('title', 'Home')
@section('content')
    

    @auth
	<i>
	{{Auth::user()->quote}}
	</i>

	@if(Session::has('send'))
	<div class="alert alert-success" role="alert">
		{{Session::get('send')}}
	</div>
	@endif

	@else
	<div>FULLSTACK DEVELOPER</div>
	@endauth
	
@endsection