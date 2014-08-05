@extends('_master')

@section('title')
    List the questions
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
    

    <div class="panel panel-info">
        <div class="panel-heading">              
            <h3 class="panel-title">Questions</h3>
        </div>
        <div class="panel-body">
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
        
            @foreach($questions as $item=> $question)
                {{ Form::open(array('url' => '/question/update', 'method' => 'POST')) }}
                <tr>
                    <td>{{ Form::hidden('id', $question->id) }} {{ $question['id'] }}</td>
                    <td>{{ $question->questionType->name }} </td>
                    <td>{{ Form::text('question_name', $question->question_name,array('class'=>'form-control')) }}</td>
                    <td>{{ Form::submit('Update') }}  <a href="/question/delete/{{ $question['id'] }}"> Delete</a></td>
                </tr>              
                {{ Form::close() }}

            @endforeach
            {{ Form::open(array('url' => '/question/create', 'method' => 'POST')) }}
               <tr>
                <td></td>
                <td>{{ Form::select('type_id', $questionTypes); }}</td>
                <td>{{ Form::text('question_name','',array('class'=>'form-control')) }}</td>
                 <td>{{ Form::submit('Add New') }}</td>
                    </tr>

            {{ Form::close() }} 

            </tbody>
            </table>

        </div>

    </div>

</div>

@stop