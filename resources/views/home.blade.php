@extends('plantilla')
@section('title', 'Home')
@section('content')
    

    @auth
	<p>You are logged</p>
	<!--------
    <img src="{{asset('storage/uploads/'.Auth::user()->foto)}}" alt="Avatar" width="50" class="img-thumbnail img-fluid" style="border-radius: 50%;">
    {{ Auth::user()->name }}
	<br>
	-------->
	<i>
	{{Auth::user()->quote}}
	</i>

	@else
	<div>FULLSTACK DEVELOPER</div>
	@endauth
	
@endsection