@extends('layouts.layout')

@section('content') 

<section class="bg-img1 txt-center p-lr-15 p-tb-42" style="background-image: url('images/bg-01.jpg');">
  <h2 class="ltext-105 cl0 txt-center">
    Login
  </h2>
</section>
<div class="container login1">
  <div class="screen">
    <div class="screen__content">
      <form class="login" method="post" action="{{route('login.process')}}">
        @csrf
        @method('post')
        <div class="login__field">
          <i class="login__icon fas fa-user"></i>
          <input type="text" class="login__input" placeholder="Email" name="email">
        </div>
        <span style="color:red">{{$errors->first('email')}}</span>
        
        <div class="login__field">
          <i class="login__icon fas fa-lock"></i>
          <input type="password" class="login__input" placeholder="Password" name="password">
        </div>
        <span style="color:red">{{$errors->first('password')}}</span>
            @if(session('status'))
              <div class="alert alert-warning">
                {{ session('status') }}
              </div>
            @endif
        <button class="button login__submit">
          <span class="button__text">Log In Now</span>
          <i class="button__icon fas fa-chevron-right"></i>
        </button>
        <a href="/user/create">Register</a>
      </form>
      <div class="social-login">
        <h3>log in via</h3>
        <div class="social-icons">
          <a href="#" class="social-login__icon fab fa-instagram"></a>
          <a href="#" class="social-login__icon fab fa-facebook"></a>
          <a href="#" class="social-login__icon fab fa-twitter"></a>
        </div>
      </div>
    </div>
    <div class="screen__background">
      <span class="screen__background__shape screen__background__shape4"></span>
      <span class="screen__background__shape screen__background__shape3"></span>
      <span class="screen__background__shape screen__background__shape2"></span>
      <span class="screen__background__shape screen__background__shape1"></span>
    </div>
  </div>
</div>
@endsection