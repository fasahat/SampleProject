@extends('layouts.master')

@section('content')

<h1>Map</h1>
<div id="mymap"></div>


<script type="text/javascript">
  	var allPoints 
  	
  	$.ajax({
		url: "/mappoints",
		method: "GET",
	   
	   	success : function(result) {
	   		allPoints = result
	   	},
	   	complete: function (result) {

	        var mymap = new GMaps({

		        el: '#mymap',

		        lat: 35.745077,

		        lng: 51.375268,

		        zoom:6

		    });

		    $.each( allPoints.Points, function( index, value ){
			    mymap.addMarker({
			    	
			        lat: value.lat,

			        lng: value.lng,


			    });
		   	});
	    }
		
	});
</script>

@stop