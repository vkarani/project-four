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

@section('user_session')
  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@stop

@section('content')
  {{-- TODO check for zero size user collection --}}
  {{-- <h1>Here are all the comments for user:- {{$user -> email }}...</h1> --}}
  <h1>Here are your comments...</h1>

  <table id="t01" class= "table table-hover table-striped table-responsive">
    <tr>
      <th>Destination</th>
      <th>Comment</th>
      <th>Edit</th>
    </tr>  
  @foreach($comments as $comment)
    <tr>
      <td>{{$comment -> destination -> name}}</td>
      <td>{{$comment -> comment}}</td>
      <td> 
        <a href='/comments/destination/edit/{{$comment -> id}}' class="btn btn-default" > Edit Comment</a> 
      </td>
    </tr>
  @endforeach
  </table>
  
@stop
