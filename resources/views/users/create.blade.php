@extends('layouts.layout')

@section('content')

@if ($errors->any())
       <div>
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{$error}}</li>
               @endforeach
           </ul>
       </div>
   @endif
   <section class="bg-img1 txt-center p-lr-15 p-tb-42" style="background-image: url('images/bg-01.jpg');">
       <h2 class="ltext-105 cl0 txt-center">
           Register
       </h2>
   </section>
   <div class="container login1">
       <div class="screen">
           <div class="screen__content">
               <form class="login" method="post" action="{{route('user.store')}}">
                   @csrf
                   @method('post')
                   <div class="login__field">
                       <i class="login__icon fas fa-envelope"></i>
                       <input type="text" class="login__input" placeholder="Email" name="email">
                   </div>
                   <div class="login__field">
                       <i class="login__icon fas fa-lock"></i>
                       <input type="password" class="login__input" placeholder="Password" name="password">
                   </div>
                   <div class="login__field">
                       <i class="login__icon fas fa-user"></i>
                       <input type="text" class="login__input" placeholder="Name" name="name">
                   </div>
                   <div class="login__field">
                       <i class="login__icon fas fa-info"></i>
                       <input type="text" class="login__input" placeholder="Description" name="description">
                   </div>
                   <button class="button login__submit">
                       <span class="button__text">Register</span>
                       <i class="button__icon fas fa-chevron-right"></i>
                   </button>
               </form>
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