@extends('_master')

@section('title')
  New York attractions
@stop

@section('styling')
  <link rel='stylesheet' href='/css/landing.css' type='text/css'>
  <link rel='stylesheet' href='/css/attraction.css' type='text/css'>
  <link rel='stylesheet' href='/css/hotel.css' type='text/css'>
@stop

@section('nav_pages')
  <li><a href="/">Home</a></li>
@stop

@section('user_session')
  {{-- Only display if NOT logged in --}}
  <li><a href="/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
  <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
@stop

@section('content')
 {{--Sign in or Register section --}}
 <section class='landing'>
  <h2>Welcome</h2>
  <p>This website allows you to plan your travel to famous New York destinations and share your travels with your friends</p>
  <p>Please <b>Sign Up</b> or <b>Login</b></p>
  
  <a href="/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
  <br>
  <a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a>
  
  {{--
  <li><a href="/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
  <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
  --}}
  {{--<p> <del><b><font color="red">NOTE !!! Only display this if user is NOT logged in.</font></b></del> </p> --}}
 </section>	
@stop
