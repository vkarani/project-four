@extends('_master')

@section('title')
  New York attractions
@stop

@section('styling')
<link rel='stylesheet' href='/css/landing.css' type='text/css'>
<link rel='stylesheet' href='/css/attraction.css' type='text/css'>
@stop

@section('content')
 {{--Sign in or Register section --}}
 <section class='landing'>
  <h2>Welcome</h2>
  <p>This website allows you to plan your travel to famous New York destinations and share your travels with your friends</p>
  <p>Please <b>Sign Up</b> or <b>Login</b></p>
  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
  <p> <del><b><font color="red">NOTE !!! Only display this if user is NOT logged in.</font></b></del> </p>
 </section>
 
 <section class='attraction'>
  <h2>Central Park</h2>
  <p>An urban green space like no other</p>
  <img style="height:auto; width:auto; max-width:250px; max-height:250px;" 
   src=' {{ URL::asset('images/attractions/Central_Park.png') }} '
   >
  <br>
  <p><a href='http://goo.gl/1ci2qj'>Map</a> |
   <a href='#'>Visit</a> |  {{-- Add to itinerary--}}
   <a href='#'>Comment</a>
   <p> <del><b><font color="red">NOTE !!! Only display this if user IS logged in.</font></b></del> </p>
  </p>
 </section>

 <section class='attraction'>
  <h2>Lady Liberty</h2>
  <p>Liberty Enlightens the world</p>
  <img style="height:auto; width:auto; max-width:250px; max-height:250px;" 
   src='{{ URL::asset('images/attractions/Statue_of_Liberty.png') }}'>
  <p><a href='http://goo.gl/tNXFfC'>Map</a> | 
   <a href='#'>Visit</a> |  {{-- Add to itinerary--}}
   <a href='#'>Comment</a>
   <p> <del><b><font color="red">NOTE !!! Only display this if user IS logged in.<font></b></del> </p>
  </p>
 </section>
@stop
