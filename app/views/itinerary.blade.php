@extends('_master')

@section('title')
Attractions
@stop

@section('styling')
<link rel='stylesheet' href='/css/itinerary.css' type='text/css'>
@stop

@section('nav_pages')
  <li><a href="/hotels">Hotels</a></li>
  <li><a href="/attractions">Attractions</a></li>
  <li><a href="/itinerary">Itinerary</a></li>
@stop

@section('user_session')
  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@stop

@section('user_session')
  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@stop

@section('content')

  @if(sizeof($itineraries) == 0)
    <p>You do not have any Itineraries set up..</p>
  @else
    <h2>Here is your itinerary</h2>
    <table id="t01" class= "table table-hover table-striped table-responsive">
    <tr>
      <th>Attraction Type</th>
      <th>Name</th>
      <th>Date From</th>		
      <th>Date To</th>
      <th>Comments</th>
    </tr>
    @foreach($itineraries as $itinerary)
      {{-- Select by the specific logged in user --}}
      @if($itinerary -> user ->email==$email)
      <tr>
        {{--Hotel --}}
        @if($itinerary -> destination -> first() -> categories()-> first()-> name=='hotel')
          <td>Hotel</td>
        @else
          {{-- Non Hotel --}}
          <td>Attraction</td>
        @endif
        <td>{{$itinerary -> destination() -> first() -> name}}</td>
        <td>{{$itinerary -> checkin_date}}</td>
        {{-- Only Display Checkout for Hotel --}}
        @if($itinerary -> destination -> first() -> categories()-> first()-> name=='hotel')
          <td>{{$itinerary -> checkout_date}}</td>
        @else
          <td></td>
        @endif
        <td>This will have some comments...</td>
      </tr>
      @endif
    @endforeach
    </table>
  @endif

  {{-- Sample below .. remove TODO
  <h2>Here is your itinerary</h2>
  <table id="t01" class= "table table-hover table-striped table-responsive">
    <tr>
      <th>Hotel</th>
      <th>Date From</th>		
      <th>Date To</th>
      <th>Comments</th>
    </tr>
    <tr>
      <td>The Standard, High Line</td>
      <td>12/1/14</td>		
      <td>12/15/14</td>
      <td>This will have some comments...</td>
    </tr>
  </table>


  <table id="t02" class = "table table-hover table-striped table-responsive">
    <tr>
      <th>Attraction</th>
      <th>Date Visited</th>		
      <th>Comments</th>
    </tr>
    <tr>
      <td>Lady Liberty</td>
      <td>12/1/14</td>		
      <td>Lady Liberty's comments</td>
    </tr>
  </table>
  --}}
@stop




