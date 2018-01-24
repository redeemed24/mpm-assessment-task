<html>
	<head>
		<title>My Plan Manager</title>
		<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	</head>

	<body>
		<div class="container">
			<div class="row">
				@yield('content')
			</div>
		</div>
	</body>

	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<script>
		var host = "{{url('/')}}/";
	</script>
	@stack('scripts')
</html>