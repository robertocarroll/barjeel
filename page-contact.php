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
    featureType: "water",
    elementType: "geometry",
    stylers: [
      { color: "#86b4d6" }
    ]
  },{
    featureType: "road",
    elementType: "geometry",
    stylers: [
      { color: "#939494" }
    ]
  },{
    featureType: "administrative",
    stylers: [
      { color: "#aeaeae" }
    ]
  },{
    featureType: "poi",
    elementType: "geometry",
    stylers: [
      { color: "#c6c5c1" }
    ]
  },{
    featureType: "road",
    elementType: "labels.text.stroke",
    stylers: [
      { color: "#ffffff" }
    ]
  },{
    featureType: "administrative",
    elementType: "labels.text.fill",
    stylers: [
      { color: "#ef4123" }
    ]
  },{
    featureType: "road",
    elementType: "labels.text.fill",
    stylers: [
      { color: "#373737" }
    ]
  },{
    featureType: "administrative",
    elementType: "labels.text.stroke",
    stylers: [
      { color: "#ffffff" }
    ]
  },{
    featureType: "landscape",
    elementType: "geometry",
    stylers: [
      { color: "#e6e6e6" }
    ]
  },{
    featureType: "road.arterial",
    elementType: "labels.icon",
    stylers: [
      { color: "#ffffff" },
      { "visibility": "off" }
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
			var myLatLng = new google.maps.LatLng(25.322311,55.376234); //add new marker
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

    <?php while ( have_posts() ) : the_post(); ?>

	     <?php the_content(); ?>	

	 <?php endwhile; // end of the loop. ?>

	</div><!-- .full-page -->
		
<?php get_footer(); ?>