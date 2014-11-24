@extends('_master')

@section('title')
Attractions
@stop

@section('styling')
<link rel='stylesheet' href='/css/attraction.css' type='text/css'>
@stop

@section('nav_pages')
  <li><a href="/hotels">Hotels</a></li>
  <li><a href="/attractions">Attractions</a></li>
  <li><a href="/itinerary">Itinerary</a></li>
@stop

@section('user_session')
  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@stop


@section('content')
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
 </p>
 </section>
@stop
