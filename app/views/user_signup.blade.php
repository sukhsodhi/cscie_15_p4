@extends('_master')

@section('title')
    Sign Up
@stop

@section('headercontent')
    <div class="jumbotron">
        <h1>Sign Up</h1>
    </div>
@stop

@section('maincontent')

    @foreach($errors->all() as $message) 
        <div class='error'>{{ $message }}</div>
    @endforeach


    {{ Form::open(array('url' => '/signup')) }}

        <div class="form-group">
        <label for="inputEmail">First Name<small>*</small></label>
            {{ Form::text('first_name','', array('class' => 'form-control')) }}
        </div>

         <div class="form-group">
        <label for="inputEmail">Last Name<small>*</small></label>
            {{ Form::text('last_name','', array('class' => 'form-control')) }}
        </div>

         <div class="form-group">
        <label for="inputEmail">Email Address<small>*</small></label>
            {{ Form::text('email','', array('class' => 'form-control')) }}
        </div>


         <div class="form-group">
        <label for="inputEmail">Password</label><small>Min: 6</small>
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Submit') }}

    {{ Form::close() }}

@stop