@extends('_master')

@section('title')
    Assignment -4 for CSCIE-15 class- Welcome Page
@stop

@section('headercontent')
<div class="jumbotron">
        <h1>User Question Answer tool</h1>
        <p>This is a sample application lets you </p>
        <ul>
            <li>show a list of users</li>
            <li>maintain a list of questions</li>
            <li>maintain a list of question types</li>
            <li>show answers for questions for current user</li>
        </ul>
    </div>
@stop

@section('maincontent')
    	
    
    

    <ul class="nav nav-tabs">
        <li class="active"><a href="/"><span class="glyphicon glyphicon-home"></span>  Welcome</a></li>
        <li><a href="/user"><span class="glyphicon glyphicon-user"></span> Users</a></li>
        <li><a href="/question"><span class="glyphicon glyphicon-question-sign"></span> Questions</a></li>
        <li><a href="/questiontype/"><span class="glyphicon glyphicon-tag"></span> Question Types</a></li>
        <li><a href="/answer"><span class="glyphicon glyphicon-comment"></span> My Answers</a></li>
    </ul>
    <p/>

    <div class="panel panel-info">
        <div class="panel-heading">              
            <h3 class="panel-title"> Users</h3>
        </div>
        <div class="panel-body">
            The application requires  login. Once an account is created a user can login adn maintain the list of questions and answer the questions.
        </div>

    </div>
    
    <div class="panel panel-info">
        <div class="panel-heading">              
            <h3 class="panel-title"> Questions</h3>
        </div>
        <div class="panel-body">
            The questions maintainance requires a login. Any authenticated user can create new questions or update exiting questions.
        </div>

    </div>

    <div class="panel panel-info">
        <div class="panel-heading">              
            <h3 class="panel-title"> Question Types</h3>
        </div>
        <div class="panel-body">
            The question type maintainance requires a login. Any authenticated user can create new question types or update exiting question types.
        </div>

    </div>
</div>

@stop