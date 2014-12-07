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
@stop

@section('user_session')
  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@stop

@section('user_session')
  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@stop


@section('content')
  <h1>Add a new visit...</h1>

	{{ Form::open(array('url' => '/itinerary/create')) }}
	
	  {{ Form::label('category','Category') }}
		{{ Form::text('category'); }}
     
		{{ Form::label('name','Name') }}
		{{ Form::text('name'); }}
		
		{{ Form::label('checkindate','Visit/Checkin Date') }}
		{{ Form::text('checkindate'); }}
		
		{{ Form::label('checkoutdate','Checkout Date') }}
		{{ Form::text('checkoutdate'); }}
{{--
	  Need Category -> hotel/attraction (select)
	  Name -> Central Park/etc (select)
	  Date from -> Mandatory
	  Date to -> only for Hotel
	  
	
		{{ Form::label('title','Title') }}
		{{ Form::text('title'); }}

		{{ Form::label('author_id', 'Author') }}
		{{ Form::select('author_id', $authors); }}

		{{ Form::label('published','Published Year (YYYY)') }}
		{{ Form::text('published'); }}

		{{ Form::label('cover','Cover Image URL') }}
		{{ Form::text('cover'); }}

		{{ Form::label('purchase_link','Purchase Link URL') }}
		{{ Form::text('purchase_link'); }}
--}}
		{{ Form::submit('Add'); }}

	{{ Form::close() }}
@stop
