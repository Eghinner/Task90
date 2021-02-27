@extends('plantilla')
@section('title', 'Page Title')
@section('content')
    

    @auth
	<p>You are logged</p>

	
    <img src="{{asset('storage/uploads/'.Auth::user()->foto)}}" alt="" width="100" class="img-thumbnail img-fluid">

    {{ Auth::user()->name }} <span class="caret"></span>
	<br>
	{{Auth::user()->quote}}

	@endauth
@endsection