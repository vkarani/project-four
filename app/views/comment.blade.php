@extends('_master')

@section('title')
Attractions
@stop

@section('styling')
<link rel='stylesheet' href='/css/comment.css' type='text/css'>
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
  <h1>Add a comment for {{ $destination -> name }} </h1>
    {{ Form::open(array('url' => '/comments/create')) }}
    <ul class="errors">
    @foreach($errors->get('comment') as $message)
        <li>{{ $message }}</li>
    @endforeach
    </ul>
		{{ Form::label('comment','Comment') }}
		<br>
		{{ Form::textarea('comment'); }}
		<br>
		{{Form::hidden('destination_id', $destination -> id)}}
		{{ Form::submit('Add'); }}
	{{ Form::close() }}
@stop
