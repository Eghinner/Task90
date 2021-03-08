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
  <label><b>Username</b></label>
  <input class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Enter Your Username"  type="text" name="name" class="form-control p_input" value="{{ old('name') }}">
</div>

<div class="form-group">
  <label><b>First Name</b></label>
  <input class="form-control {{$errors->has('firstname')?'is-invalid':''}}" placeholder="Enter Your First Name"  type="text" name="firstname" class="form-control p_input" value="{{ old('firstname') }}">
</div>
<div class="form-group">
  <label><b>Last Name</b></label>
  <input class="form-control {{$errors->has('lastname')?'is-invalid':''}}" placeholder="Enter Your Last Name"  type="text" name="lastname" class="form-control p_input" value="{{ old('lastname') }}">
</div>

<div class="form-group">
  <label><b>Email</b></label>
  <input class="form-control {{$errors->has('email')?'is-invalid':''}}" placeholder="Enter Your Email" type="email" name="email" class="form-control p_input" value="{{ old('email') }}">
</div>

<div class="form-group">
  <label><b>Password</b></label>
  <input class="form-control {{$errors->has('password')?'is-invalid':''}}" placeholder="Enter Your Password" type="text" name="password" class="form-control p_input">
  <small class="bg-gray">*****Key entered must include one of these signs ( * \  - _ & % # $ @ ). And capital letter. lower case. numbers. You know ... don't trust anyone*****</small>
</div>

<!---------------------------------------->
<div class="form-group">
  <label><b>Confirm Password</b></label>
  <input class="form-control {{$errors->has('password2')?'is-invalid':''}}" placeholder="Confirm Your Password" type="password" name="password2" class="form-control p_input">
</div>

<!---------------------------------------->
<div class="form-group">
  <div class="">
  <label><b>Sentence</b></label>
  
  <input  id="lol" type="text" name="quote" class="form-control p_input form-control {{$errors->has('password2')?'is-invalid':''}}" value="{{ old('quote') }}" readonly>
</div>
  <div class="btn btn-secondary btn-sm"><p style="cursor: pointer;" onclick="lol();"><small>CHOOSE YOUR SENTENCE</small></p></div>
  </div>

<!---------------------------------------->
<div class="form-group">
  <label><b>Avatar</b></label>
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
