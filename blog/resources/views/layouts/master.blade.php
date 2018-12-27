<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">	
	<link href="{{ asset('css/master.css') }}" rel="stylesheet">	
	<meta charset="UTF-8">
	<script src="http://maps.google.com/maps/api/js"></script>

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
	<title>Document</title>
	  	<style type="text/css">

    	#mymap {

      		border:1px solid red;

      		width: 800px;

      		height: 500px;

    	}

  	</style>
</head>
<body>
	@yield('content')
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
</body>
</html>