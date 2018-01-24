<html>
	<head>
		<title>My Plan Manager</title>
		<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
		<style>
			.loader{
		        width: 100%;
		        height: 100%;
		        top: 0px;
		        left: 0px;
		        position: fixed;
		        display: block;
		        opacity: .9;
		        background-color: #fff;
		        z-index: 99;
		        text-align: center;
		    }
		    .loader-content{
		        position: absolute;
		        top: 250px;
		        left: 550px;
		        z-index: 600;
		    }
		</style>
	</head>

	<body>
		<div class="container">
			<div class="row">
				@include('widgets.loader')
				@yield('content')
			</div>
		</div>
	</body>

	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<script>var host = "{{url('/')}}/api/";</script>
	<script src="{{asset('js/ajax.js')}}"></script>
	@stack('scripts')
</html>