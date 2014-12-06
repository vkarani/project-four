@extends('_master')

@section('styling')
<link rel='stylesheet' href='/css/login_signup.css' type='text/css'>
@stop

@section('content')
<section class='signup'>
 <h1>Sign up</h1>

 {{ Form::open(array('url' => '/signup')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

 {{ Form::close() }}
 </section>
@stop
