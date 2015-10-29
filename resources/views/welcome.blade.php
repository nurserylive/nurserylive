<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
		{!! HTML::style('//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css') !!}
		
		{!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
		{!! HTML::style('css/jquery.dataTables.min.css') !!}
		{!! HTML::style('css/mycss.css') !!}
		{!! HTML::script('//code.jquery.com/jquery-1.11.3.min.js') !!}
		{!! HTML::script('//code.jquery.com/ui/1.11.2/jquery-ui.js') !!}
		{!! HTML::script('js/jquery.dataTables.min.js') !!}
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
        </style>
		<script>
		  $(function() {
			$( "#datepicker" ).datepicker();
		  });
		  
  </script>
    </head>
    <body>
		<nav class="center navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#">NurseryLive</a>
			</div>
			<div>
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="customers">Customers</a></li>
				<li><a href="#">Notifications</a></li>
				<li><a href="#">Contact Us</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
