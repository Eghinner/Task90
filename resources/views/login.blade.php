@extends('plantilla')
@section('title', 'Login')
@section('content')

<form method="post" action="{{ route('login') }}">
    @csrf
  <div class="form-group">
    <label><b>Username</b></label>
    <input type="text" name="name" class="form-control p_input" placeholder="Enter Your Username">
  </div>
  <div class="form-group">
    <label><b>Password</b></label>
    <input type="password" name="password" class="form-control p_input" placeholder="Enter Your Password">
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
  </div>

  <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign Up</a></p>
</form>
 @endsection