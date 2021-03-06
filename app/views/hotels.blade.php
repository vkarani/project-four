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
  <li><a href="/friends">Friends</a></li>
@stop

@section('user_session')
  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@stop

@section('content')
  @foreach($destinations as $destination)
    @foreach($destination -> categories as $category)
      @if(($category -> name)=='hotel')
        <section class='hotel'>
          <h2>{{ $destination -> name }}</h2>
          <p>{{$destination -> description}}</p>
          <a href="/destinations/{{$destination->id}}">   {{-- TODO: point this to the edit page. Use $destination -> id --}}
            <img style="height:auto; width:auto; max-width:250px; max-height:250px;" 
            {{--src=' {{ URL::asset('$destination -> link') }} '> --}}
            src='{{$destination -> link}}' alt="Hotel Image" >
          </a>
          <p><a href='{{$destination -> map}}'>Map</a> |
               <a href='/itinerary/create'>Add</a> |
               {{-- TODO Bonus ... pass the destination id to the itinerary create form --}}
               <a href='/comments/destination/{{$destination -> id}}'>Comments</a>
        </section>
      @endif
    @endforeach
  @endforeach  
@stop
