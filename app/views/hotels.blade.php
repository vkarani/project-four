@extends('_master')

@section('title')
Attractions
@stop

@section('styling')
<link rel='stylesheet' href='/css/hotel.css' type='text/css'>
@stop


@section('content')
<section class='hotel'>
 <h2>The Standard, High Line</h2>
 <p>Amazing views straddling a one of a kind elevated park</p>
 <img style="height:auto; width:auto; max-width:250px; max-height:250px;" 
  src=' {{ URL::asset('images/hotels/Standard.png') }} '
  >
 <br>
 <p><a href='http://goo.gl/O1NfVZ'>Map</a> |
  <a href='#'>Book</a> |  {{-- Add to itinerary--}}
  <a href='#'>Comment</a>
 </p>
</section>

<section class='hotel'>
 <h2>The W Hotel</h2>
 <p>Midtown and next to everything</p>
 <img style="height:auto; width:auto; max-width:250px; max-height:250px;" 
  src='{{ URL::asset('images/hotels/W.png') }}'>
 <p><a href='http://goo.gl/326Dnd'>Map</a> | 
  <a href='#'>Book</a> |  {{-- Add to itinerary--}}
  <a href='#'>Comment</a>
 </p>
 </section>
@stop
