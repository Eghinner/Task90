@extends('plantilla')
@section('title', 'Contact')
@section('content')
    <h2>Let us a Message</h2>

    	<form action="{{route('contact.store')}}" method="post">
    		@csrf
    		<label>
    			Titulo:
    		</label>
    			<input type="text" name="titulo">
    		<br>
    		@error('titulo')
    			<p><strong>{{$message}}</strong></p>
    		@enderror
    		<label>
    			Email:
    		</label>
    			<input type="email" name="email"> 
    		<br>  
    		@error('email')
    			<p><strong>{{$message}}</strong></p>
    		@enderror		
    		<label>
    			Descripcion
    		</label>
    			<textarea name="desc" rows="4"></textarea>    		
    		<br>
    		@error('desc')
    			<p><strong>{{$message}}</strong></p>
    		@enderror
    		<button type="submit">Enviar</button>
    	</form>

    @if (session('info'))
    	<script>
    		alert("{{session('info')}}");
    	</script>
   	@endif

    @auth		
    <img src="{{asset('storage/uploads/'.Auth::user()->foto)}}" alt="" width="100" class="img-thumbnail img-fluid">

    {{ Auth::user()->name }} <span class="caret"></span>
	<br>
	{{Auth::user()->quote}}

	@endauth
@endsection