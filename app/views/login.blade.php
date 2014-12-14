@extends('_master')

@section('styling')
<link rel='stylesheet' href='/css/login_signup.css' type='text/css'>
@stop

@section('content')
<section class='login'>
<h1>Log in</h1>

{{ Form::open(array('url' => '/login')) }}

    Email<br>
    {{ Form::text('email') }}<br>
    {{--<del><b><font color="red">user1@email.com</font></b></del>--}}
    <br>

    Password:<br>
    {{ Form::password('password') }}<br>
    {{--<del><b><font color="red">password</font></b></del>--}}
    <br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}                  
</section>
@stop
