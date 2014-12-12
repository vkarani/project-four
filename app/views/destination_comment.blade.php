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
@stop

@section('user_session')
  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@stop

@section('content')
  {{-- TODO check for zero size destination collection --}}
  <h1>Here are all the comments for {{$destination->name }}...</h1>

  <table id="t01" class= "table table-hover table-striped table-responsive">
    <tr>
      <th>User</th>
      <th>Comment</th>
    </tr>  
  @foreach($comments as $comment)
    <tr>
      <td>{{$comment -> user -> email}}</td>
      <td>{{$comment -> comment}}</td>
    </tr>
  @endforeach
  </table>
  
@stop
