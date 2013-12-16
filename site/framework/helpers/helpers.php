<?php 

/*-----------------------------------------------------------------------------------

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file,
	When things go wrong, they tend to go wrong in a big way.
	You have been warned!

-------------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*  Get Revolution Sliders Items
/* ----------------------------------------------------------------------------------*/
function getRevolutionSliders(){
	global $wpdb;
	$query = $wpdb->get_results( 
		"
		SELECT id, title, alias
		FROM ".$wpdb->prefix."revslider_sliders
		ORDER BY title LIMIT 999
		"
	);
	$revSliders = array();
	
	if ($query) {
		$revSliders[] = array('value' => '', 'label' => 'Select a Slider');
		foreach ( $query as $slider ) {
		  $revSliders[] = array('value' => $slider->alias, 'label' => $slider->title);
		}
	} else {
		$revSliders[] = array('value' => '', 'label' => 'No Slider Found');
	}

	return $revSliders;
}