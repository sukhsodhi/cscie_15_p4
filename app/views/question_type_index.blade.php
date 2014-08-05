@extends('_master')

@section('title')
    Question Types
@stop

@section('headercontent')
    <div class="jumbotron">
        <h1>Question Types Maintenance</h1>
    </div>
@stop

@section('maincontent')
    <ul class="nav nav-tabs">
        <li><a href="/"><span class="glyphicon glyphicon-home"></span>  Welcome</a></li>
        <li><a href="/user"><span class="glyphicon glyphicon-user"></span> Users</a></li>
        <li><a href="/question"><span class="glyphicon glyphicon-question-sign"></span> Questions</a></li>
        <li class="active"><a href="/questiontype/"><span class="glyphicon glyphicon-tag"></span> Question Types</a></li>
        <li><a href="/answer"><span class="glyphicon glyphicon-comment"></span> My Answers</a></li>
    </ul>
    <p/>

    <div class="panel panel-info">
        <div class="panel-heading">              
            <h3 class="panel-title">Question Types</h3>
        </div>
        <div class="panel-body">
            <a href="/question">Back to Questions</a> 
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            @foreach($questionTypes as $item=> $questionType)
                {{ Form::open(array('url' => '/questiontype/update', 'method' => 'POST')) }}
                <tr>
                <td>{{ Form::hidden('id', $questionType->id) }} {{ $questionType['id'] }}</td>
                <td>{{ Form::text('name', $questionType->name ,array('class'=>'form-control'))}}</td>
                <td>{{ Form::submit('Update') }} <a href="/questiontype/delete/{{ $questionType['id'] }}"> Delete</a></td>
            </tr>
                
                {{ Form::close() }}

            @endforeach
            
            {{ Form::open(array('url' => '/questiontype/create', 'method' => 'POST')) }}
               <tr>
                <td></td>
                <td>{{ Form::text('name','',array('class'=>'form-control')) }}</td>
                 <td>{{ Form::submit('Add New') }}</td>
                    </tr>

            {{ Form::close() }} 
          
        </div>

    </div>

</div>

@stop