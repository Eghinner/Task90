@extends('plantilla')
@section('content')
<form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
  @csrf
<div class="form-group">
  <label>Username</label>
  <input type="text" name="name" class="form-control p_input">
</div>

<div class="form-group">
  <label>Email</label>
  <input type="email" name="email" class="form-control p_input">
</div>
<div class="form-group">
  <label>Password</label>
  <input type="password" name="password" class="form-control p_input">
</div>
<div class="form-group">
  <label>Quote</label>
  <input type="text" name="quote" class="form-control p_input" value="{{ $random->content}}" readonly>
</div>
<div class="form-group">
  <label>Avatar</label>
  <input type="file" name="foto" class="form-control">
</div>

<div class="text-center">
  <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
</div>

<p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p>


</form>

@endsection
