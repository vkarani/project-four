@extends('_master')

@section('title')
Attractions
@stop

@section('styling')
<link rel='stylesheet' href='/css/hotel.css' type='text/css'>
@stop

@section('nav_pages')
  <li><a href="/hotels">Hotels</a></li>
  <li><a href="/attractions">Attractions</a></li>
  <li><a href="/itinerary">Itinerary</a></li>
  <li><a href="/comments/user/{{Auth::user() -> id}}">Comments</a></li>
@stop

@section('user_session')
  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@stop

@section('content')
  <h2>{{ $destination -> name }}</h2>
  <p>{{ $destination -> description }}</p>   {{-- TODO: use the id to get the edit page --}}
  <p>  
  <a href='/comments/destination/add/{{$destination -> id}}' class="btn btn-default"  >Add Comment</a>
  </p>
  <img style="height:auto; width:auto; max-width:800px; max-height:800px;" 
  src='/{{$destination -> link}}'>
          
  {{-- <p><a href='{{$destination -> map}}'>Map</a> |
       <a href='/itinerary/create'>Add</a> |
       <a href='/comments/destination/{{$destination -> id}}'>Comments</a>
  --}}
  
@stop
