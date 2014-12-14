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

  {{--
  	Need Category -> hotel/attraction (select)
	  Name -> Central Park/etc (select)
	  Date from -> Mandatory
	  Date to -> only for Hotel
  --}}
  
  
	{{ Form::open(array('url' => '/itinerary/create')) }}
	  {{--
	   If I get time, I will come back and enable cases where a destination can be more than one thing 
	   i.e. a Hotel and a restaurant.
	  {{ Form::label('category','Category') }}
		{{ Form::text('category'); }}
    --}}
    
    {{ Form::label('destination_id', 'Place') }}
		{{ Form::select('destination_id', $destinations); }}
    <br>
    {{--
		{{ Form::label('name','Name') }}
		{{ Form::text('name'); }}
		--}}
		
		{{--
		{{ Form::label('checkindate','Visit/Checkin Date') }}
		{{ Form::text('checkindate'); }}
		{{ Form::label('checkintime','Visit/Checkin Time') }}
		{{ Form::text('checkintime'); }}
		--}}
		
		<ul class="errors">
    @foreach($errors->get('checkindate') as $message)
        <li>{{ $message }}</li>
    @endforeach
    </ul>		
		<label for="checkindate">Visit/Checkin Date</label>
		<input name="checkindate" type="date" id="checkindate">

		<ul class="errors">
    @foreach($errors->get('checkintime') as $message)
        <li>{{ $message }}</li>
    @endforeach
    </ul>
		<label for="checkintime">Visit/Checkin Time</label>
		<input name="checkintime" type="time" id="checkintime">
    <br>

		{{--
		{{ Form::label('checkoutdate','Checkout Date') }}
		{{ Form::text('checkoutdate'); }}
		
		{{ Form::label('checkouttime','Checkout Time') }}
		{{ Form::text('checkouttime'); }}
		--}}
		
		<ul class="errors">
    @foreach($errors->get('checkoutdate') as $message)
        <li>{{ $message }}</li>
    @endforeach
    </ul>
		<label for="checkoutdate">Checkout Date</label>
		<input name="checkoutdate" type="date" id="checkoutdate">
		
		<ul class="errors">
    @foreach($errors->get('checkouttime') as $message)
        <li>{{ $message }}</li>
    @endforeach
    </ul>
		<label for="checkouttime">Checkout Time</label>
		<input name="checkouttime" type="time" id="checkouttime">
		<br>

		{{ Form::submit('Add'); }}

	{{ Form::close() }}
@stop
