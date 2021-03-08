@extends('plantilla')
@section('title', 'Register')
@section('content')

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
  <ul>
    @foreach($errors->all() as $error)
  <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
  @csrf
<div class="form-group">
  <label>Username</label>
  <input  type="text" name="name" class="form-control p_input" value="{{ old('name') }}">
</div>

<div class="form-group">
  <label>Email</label>
  <input  type="email" name="email" class="form-control p_input" value="{{ old('email') }}">
</div>

<div class="form-group">
  <label>Password</label>
  <input  type="password" name="password" class="form-control p_input">
</div>

<!---------------------------------------->
<div class="form-group">
  <label>Re-Password</label>
  <input  type="password" name="password2" class="form-control p_input">
</div>

<!---------------------------------------->
<div class="form-group">
  <label>Quote</label>
  <input id="lol"  type="text" name="quote" class="form-control p_input" value="{{ old('quote') }}" readonly>
  <p style="cursor: pointer;" onclick="lol();">Click</p>
</div>

<div class="form-group">
  <label>Avatar</label>
  <input  type="file" name="foto" class="form-control">
</div>

<div class="text-center">
  <button  type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
</div>

<p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p>
</form>


<script>
	function lol() {
		fetch ('https://api.quotable.io/random') 
	    .then (res => res.json ())
	    .then (data => {
		let ore = document.querySelector('#lol').value = data['content'];
		ore = data['content'];
	})
	}
</script>
@endsection
