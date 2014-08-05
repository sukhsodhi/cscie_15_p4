@extends('_master')

@section('title')
    List the Users
@stop

@section('headercontent')
    <div class="jumbotron">
        <h1>Users Maintenance</h1>
    </div>
@stop

@section('maincontent')
    <ul class="nav nav-tabs">
        <li><a href="/"><span class="glyphicon glyphicon-home"></span>  Welcome</a></li>
        <li class="active"><a href="/user"><span class="glyphicon glyphicon-user"></span> Users</a></li>
        <li><a href="/question"><span class="glyphicon glyphicon-question-sign"></span> Questions</a></li>
        <li><a href="/questiontype/"><span class="glyphicon glyphicon-tag"></span> Question Types</a></li>
        <li><a href="/answer"><span class="glyphicon glyphicon-comment"></span> My Answers</a></li>
    </ul>
    <p/>
    

    <div class="panel panel-info">
        <div class="panel-heading">              
            <h3 class="panel-title">All User</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    
                </tr>
            </thead>
            <tbody>
        
            @foreach($users as $item=> $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['first_name'] }} </td>
                    <td>{{ $user['last_name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                </tr>              
                

            @endforeach
        

            </tbody>
            </table>

        </div>

    </div>

</div>

@stop