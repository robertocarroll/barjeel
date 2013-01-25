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

			 // Create an array of styles.
  var styles = [

  	{
    stylers: [
      { gamma: 0.99 }
    ]
  },
    {
    featureType: "landscape",
    elementType: "geometry",
    stylers: [
      { color: "#ef4022" },
      { visibility: "on" }
    ]
  }, 
  {
    featureType: "water",
    stylers: [
      { color: "#85b5d5" }
    ]
  },
  {
    featureType: "road",
    elementType: "geometry",
    stylers: [
      { color: "#949498" }
    ]
  }, 
  {
    featureType: "poi",
    elementType: "geometry",
    stylers: [
      { color: "#c4c3c4" }
    ]
  }, 
  {
    featureType: "road",
    elementType: "labels.text.stroke",
    stylers: [
      { color: "#ffffff" }
    ]
  }
  ];

  // Create a new StyledMapType object, passing it the array of styles,
  // as well as the name to be displayed on the map type control.
  var styledMap = new google.maps.StyledMapType(styles,
    {name: "Styled Map"});

  // Create a map object, and include the MapTypeId to add
  // to the map type control.
  var mapOptions = {
			    zoom: 14,
			    center: new google.maps.LatLng(25.329006, 55.366824),
			    zoomControlOptions: {
    style: google.maps.ZoomControlStyle.SMALL
  },	
			    mapTypeControl: false,
				scaleControl: false,
				streetViewControl: false,
				overviewMapControl: false,
				draggable: true,
				disableDoubleClickZoom: true,     //disable zooming
				scrollwheel: false
  		};
  

  var map = new google.maps.Map(document.getElementById('map_canvas'),
    mapOptions);

  //Associate the styled map with the MapTypeId and set it to display.
  map.mapTypes.set('map_style', styledMap);
  map.setMapTypeId('map_style');


			var image = '<?php echo get_template_directory_uri(); ?>/images/custom.png';
			var myLatLng = new google.maps.LatLng(25.329006, 55.366824); //add new marker
			var barjeelMarker = new google.maps.Marker({
				      position: myLatLng,
				      map: map,
				      icon: image
				  });
			
	
		}//end initialize

		google.maps.event.addDomListener(window, "load", initialize); 
	
	</script>

	
	
<!--Google Maps APIv3 -->	

		<div id="map_canvas" ></div>	

	<div class="full-page white">			

	<?php the_content(); ?>	

	
	</div><!-- .full-page -->
		
<?php get_footer(); ?>