<?php
/*
Template Name: Contact page

*/
?>

<?php get_header(); ?>
		
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
  	
	<script type="text/javascript">
	  	
		/*
		Global
		*/
		var map;
	
		function initialize() {
	    	
			/*
			Basic Setup
			*/
	
			var latLng = new google.maps.LatLng(25.322311, 55.3762336);
			
	    	var myOptions = {
				panControl: false,
				zoomControl: false,
				mapTypeControl: false,
				scaleControl: false,
				streetViewControl: false,
				overviewMapControl: false,
				draggable: true,
				disableDoubleClickZoom: true,     //disable zooming
				scrollwheel: false,
	      		zoom: 15,
	      		center: latLng,
	      		mapTypeId: google.maps.MapTypeId.SATELLITE //   ROADMAP; SATELLITE; HYBRID; TERRAIN;
			};
	    	
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			
	
		}//end initialize

		google.maps.event.addDomListener(window, "load", initialize); 
	
	</script>

	
		


<!--Google Maps APIv3 Background-->
	<div id="canvas_holder">
		<div id="map_canvas"></div>
	</div><!-- End Google Maps Background -->


	

<?php get_footer(); ?>