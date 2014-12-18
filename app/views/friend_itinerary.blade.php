@extends('_master')

@section('title')
Itinerary
@stop

@section('styling')
<link rel='stylesheet' href='/css/itinerary.css' type='text/css'>
@stop

@section('nav_pages')
  <li><a href="/hotels">Hotels</a></li>
  <li><a href="/attractions">Attractions</a></li>
  <li><a href="/itinerary">Itinerary</a></li>
  <li><a href="/comments/user/{{Auth::user() -> id}}">Comments</a></li>
  <li><a href="/friends">Friends</a></li>
@stop

@section('user_session')
  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@stop

@section('user_session')
  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@stop

@section('content')
  
  @if(sizeof($itineraries) == 0)
    <h2> No Itineraries set up for {{$user_email}}..</h2>
  @else
    <h2>This the itinerary of your friend {{$user_email}}</h2>
    <table id="t01" class= "table table-hover table-striped table-responsive">
    <tr>
      <th>Attraction Type</th>
      <th>Name</th>
      <th>Date From</th>		
      <th>Date To</th>
      <th>Comments</th>
    </tr>
    @foreach($itineraries as $itinerary)
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
      <td>
      <a href='/comments/destination/{{$itinerary -> destination() -> first() -> id}}' class="btn btn-default">Comments</a>
      </td>	      
      </tr>
    @endforeach
    </table>
  @endif
@stop
