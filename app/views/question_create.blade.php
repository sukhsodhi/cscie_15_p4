@extends('_master')

@section('title')
    Create a new questions
@stop

@section('headercontent')
    <div class="jumbotron">
        <h1>Questions Maintenance</h1>
    </div>
@stop

@section('maincontent')
	<ul class="nav nav-tabs">
        <li><a href="/"><span class="glyphicon glyphicon-home"></span>  Welcome</a></li>
        <li><a href="/user"><span class="glyphicon glyphicon-user"></span> Users</a></li>
        <li class="active"><a href="/question"><span class="glyphicon glyphicon-question-sign"></span> Questions</a></li>
        <li><a href="/questiontype/"><span class="glyphicon glyphicon-tag"></span> Question Types</a></li>
        <li><a href="/answer"><span class="glyphicon glyphicon-comment"></span> My Answers</a></li>
    </ul>
    <p/>

	{{ Form::open(array('url' => '/question/create', 'method' => 'POST')) }}
		<table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Type</th>
                    <th>Qyestion</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>

		<div class='form-group'>
			{{ Form::label('type_id', 'Question Type') }}
			{{ Form::select('type_id', $questionTypes); }}
			&nbsp;<a href='/questiontype/'> edit</a>
		</div> 

		<div class='form-group'>
			{{ Form::label('Question') }} 
			{{ Form::text('question_name') }}

			{{ Form::submit('Add') }}
		</div>

		

	{{ Form::close() }}
@stop