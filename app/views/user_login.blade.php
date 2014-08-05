@extends('_master')

@section('title')
    Login
@stop

@section('headercontent')
    <div class="jumbotron">
        <h1>Login</h1>
    </div>
@stop

@section('maincontent')
    {{ Form::open(array('url' => '/login')) }}

        Email<br>
        {{ Form::text('email') }}<br><br>

        Password:<br>
        {{ Form::password('password') }}<br><br>

        {{ Form::submit('Submit') }}

    {{ Form::close() }}

@stop