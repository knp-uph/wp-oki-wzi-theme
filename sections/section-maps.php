<?php
/**
 * Google Maps Section
*/

wp_enqueue_script( 'google_maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDFozu9MnyNqjQn83bYX9XxHsf52SND8Ds&callback=showGoogleMaps' );

?>
<style type="text/css">
	
#maps {
	width: 100%;
	min-height: 400px;
	position: relative;
}
#google-maps {
	position: absolute;
	width: 100%;
	height: 100%;
	z-index: -1;
}
#maps .theme-description {
	width: 100%;
	height: 100%;
	padding: 106px 0 138px;
}
#maps .header-part {
	max-width: 600px;
	background: white;
	margin: 0;
	float: right;
	padding: 20px 20px 5px;
}
</style>
<?php

$section_title= get_theme_mod( 'oki_wzi_maps_section_title' );
$button_one   = get_theme_mod( 'oki_wzi_maps_section_button_one' );
$btn_one_link = get_theme_mod( 'oki_wzi_maps_button_one_url' ); 
$button_two   = get_theme_mod( 'oki_wzi_maps_section_button_two' );
$btn_two_link = get_theme_mod( 'oki_wzi_maps_button_two_url' );

if( $section_title || $button_one || $btn_one_link || $button_two || $btn_two_link ){
?>
<div id="google-maps"></div>
<div class="theme-description">
	<div class="container">
	<?php education_zone_get_section_header( $section_title ); 
   
        if( $button_one && $btn_one_link ) echo '<a href="' . esc_url( $btn_one_link ) . '" class="apply" target="_blank">' . esc_html( $button_one ) . '</a>';
        if( $button_two && $btn_two_link ) echo '<a href="' . esc_url( $btn_two_link ) . '" class="apply" target="_blank">' . esc_html( $button_two ) . '</a>'; 
	         
	?>
    </div>
</div>
<?php 
}
?>
<script type="text/javascript">
function showGoogleMaps() {

    var latLng = new google.maps.LatLng(52.164316, 22.273091);
    var latLngCenter = new google.maps.LatLng(52.164091, 22.280695);
  
    var mapOptions = {
        zoom: 16, // initialize zoom level - the max value is 21
        streetViewControl: false, // hide the yellow Street View pegman
        scaleControl: true, // allow users to zoom the Google Map
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: latLngCenter
    };

    var map = new google.maps.Map(document.getElementById('google-maps'),
        mapOptions);

    // Show the default red marker at the location
    var marker = new google.maps.Marker({
        position: latLng,
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP
    });
}

// google.maps.event.addDomListener(window, 'load', showGoogleMaps);
</script>