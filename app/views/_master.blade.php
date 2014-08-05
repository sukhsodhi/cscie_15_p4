<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
  	<title>@yield('title' ,'Assignment -4 for CSCIE-15 class')</title>

  	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>

	<!-- Optional theme -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>

	<!-- Latest compiled and minified JavaScript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<body role="document">
	<div class="container theme-showcase" role="main">  
	@yield('headercontent')

	@if(Auth::check())
		<a href='/logout'>Log out {{ Auth::user()->email; }}</a><br>
	@else 
		<a href='/signup'>Sign up</a> or <a href='/login'>Log in</a><br/>
	@endif

	@if(Session::get('flash_message'))
	<div class="alert alert-error">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Error!</strong> {{ Session::get('flash_message') }}.
	</div>
	@endif

	@if(Session::get('status_message'))
	<div class="alert alert-status">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Success</strong> {{ Session::get('status_message') }}.
	</div>
	@endif

    @yield('maincontent')
	</div>
    
    @yield('footer')

</body>
</html>