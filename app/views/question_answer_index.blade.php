@extends('_master')

@section('title')
    My Answers
@stop

@section('headercontent')
    <div class="jumbotron">
        <h1>My Answers</h1>
    </div>
@stop

@section('maincontent')
    <ul class="nav nav-tabs">
        <li><a href="/"><span class="glyphicon glyphicon-home"></span>  Welcome</a></li>
        <li><a href="/user"><span class="glyphicon glyphicon-user"></span> Users</a></li>
        <li><a href="/question"><span class="glyphicon glyphicon-question-sign"></span> Questions</a></li>
        <li><a href="/questiontype/"><span class="glyphicon glyphicon-tag"></span> Question Types</a></li>
        <li class="active"><a href="/answer"><span class="glyphicon glyphicon-comment"></span> My Answers</a></li>
    </ul>
    <p/>
    

    <div class="panel panel-info">
        <div class="panel-heading">              
            <h3 class="panel-title">My Answers</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
        
            @foreach($userAnswers as $item=> $userAnswer)
                {{ Form::open(array('url' => '/answer/update', 'method' => 'POST')) }}
                <tr>
                    <td>{{ Form::hidden('id', $userAnswer->id) }} {{ Form::hidden('question_id', $userAnswer->question_id) }} {{ $userAnswer->question_name}}</td>
                    <td>{{ Form::text('answer', $userAnswer->answer,array('class'=>'form-control')) }}</td>
                    <td>{{ Form::submit('Update') }}  <a href="/answer/delete/{{ $userAnswer->id}}"> Delete</a></td>
                </tr>              
                {{ Form::close() }}

            @endforeach
            {{ Form::open(array('url' => '/answer/create', 'method' => 'POST')) }}
               <tr>
                <td>{{ Form::select('question_id', $questions); }}</td>
                <td>{{ Form::text('answer','',array('class'=>'form-control')) }}</td>
                 <td>{{ Form::submit('Add New') }}</td>
                    </tr>

            {{ Form::close() }} 

            </tbody>
            </table>

        </div>

    </div>

</div>

@stop