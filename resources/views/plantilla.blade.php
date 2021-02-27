<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>App Name - @yield('title')</title>
	<link rel="stylesheet" href="../css/app.css">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</head>
<body>
	<nav class="navbar navbar-light bg-primary">
  	<form class="form-inline">
  		@csrf
  		
    <button class="btn btn-outline-success bg-info" type="button"><a href="{{ route('register') }}">REGISTER</a></button>
    	
    <button class="btn btn-outline-success bg-info" type="button"><a href="{{ route('login') }}">LOGIN</a></button> 
    @auth
    <button class="btn btn-outline-success bg-info" type="button"><a href="{{ route('contact.index') }}">CONTACT</a></button> 

    <button class="btn btn-outline-success bg-info" type="button"><a href="{{ url('api/users') }}">Api</a></button> 
    	@endauth
</form>
	<a href="{{ url('/logout') }}" class="btn btn-danger">Logout2</a>

	</nav>


   
	@if(Session::has('Message'))
		{{Session::get('Message')}}
	@endif

	<div class="container">
	    @yield('content')
	</div>
</body>
</html>