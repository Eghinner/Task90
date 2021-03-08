<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Task90 - @yield('title')</title>
	<link rel="stylesheet" href="../css/app.css">
	<!----Fontawesome---->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!---------------Estilos------------------------->
<style>
.navigation {
	position: absolute;
	display: flex;
	flex-direction: column;
	background-color: #fff;
	width: 300px;
	text-align: left;
	left: -500px;
	transition-duration: 0.5s;
}

.navigation.show {
	transition-duration: 0.5s;
	left: 0;
}

.menu-btn {
	position: absolute;
	display: block;
	right: 0;
	cursor: pointer;
	margin: 10px;

}
</style>
</head>
<body>
	<nav class="navbar navbar-light bg-primary">
  	<form class="form-inline">
  		@csrf
 	   @auth
 	<img src="{{asset('storage/uploads/'.Auth::user()->foto)}}" alt="Avatar" width="70" class="img-thumbnail img-fluid" style="border-radius: 50%;">
 	<div class="btn btn-outline-success bg-info">{{ Auth::user()->name }}</div>
 <!---
    <button class="btn btn-outline-success bg-info" type="button"><a href="{{ route('contact.index') }}">CONTACT</a></button> 
---->
    <button class="btn btn-outline-success bg-info" type="button"><a href="{{ url('api/users') }}">Api</a></button> 
    <a href="{{ url('/logout') }}" class="btn btn-danger">Logout2</a>
    	@else
    <button class="btn btn-outline-success bg-info" type="button"><a href="{{ route('register') }}">REGISTER</a></button>
    	
    <button class="btn btn-outline-success bg-info" type="button"><a href="{{ route('login') }}">LOGIN</a></button> 
    	@endauth
</form>
<!--------
	@auth
	<a href="{{ url('/logout') }}" class="btn btn-danger">Logout2</a>
	@endauth
--------->
	@auth
	<div class="menu-btn">
    	<i class="fas fa-bars fa-2x"></i>
  	</div>
  	@endauth
	</nav>


   
	@if(Session::has('Message'))
		{{Session::get('Message')}}
	@endif

	<div class="container">
	    @yield('content')
	</div>
<!------------------------Contacto------------------------------------------>
		<div class="navigation">
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
					<div style="display:none;">
					<label>
						Email:
					</label>
						<input type="email" name="email" readonly 
						@auth
						value="{{Auth::user()->email}}" 
						@else
						value="exemple@gmail.com">
						@endauth
					</div>
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
		</div>
<!------------------------------------------------------------------>
<script>
	document.querySelector(".menu-btn").addEventListener("click", () => {
  document.querySelector(".navigation").classList.toggle("show");
});
</script>
</body>
</html>