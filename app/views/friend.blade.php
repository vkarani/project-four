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
  <h2>Here are your friends</h2>
  
  <table id="t01" class= "table table-hover table-striped table-responsive">
  @foreach(Auth::user()->friends as $i)
    <tr>
    <td>
      <li> {{$i->email}}     {{-- email --}}
    </td>
    <td>
      <a href='/friends/itinerary/{{$i->id}}' class="btn btn-default"> Itinerary</a> {{-- Link to itinerary --}}
    </td>
    <td>
      {{-- Remove Friend --}}
      {{ Form::open(['method' => 'DELETE', 'action' => ['FriendController@postDelete', $i -> id]]) }}
		    <a href='javascript:void(0)' onClick='parentNode.submit();return false;' class="btn btn-danger" >Remove Friend</a>
	    {{ Form::close() }}
	  </td>  
    </li>
    </tr>
  @endforeach
  </table>
  
  <h2>You can add friends below</h2>
  {{ Form::open(array('url' => '/friends/add')) }}
  {{-- Form::open(['method' => 'ADD' , 'action' => ['FriendController@postAdd',] ])           --}}
    <ul class="errors">
    @foreach($errors->get('friend') as $message)
        <li>{{ $message }}</li>
    @endforeach
    </ul>
		{{ Form::label('friend','email address of friend') }}
		<br>
		{{ Form::email('friend'); }}
		<br>
		{{-- Form::hidden('destination_id', $destination -> id) --}}
		{{ Form::submit('Add'); }}
	{{ Form::close() }}
  
  
  
@stop
