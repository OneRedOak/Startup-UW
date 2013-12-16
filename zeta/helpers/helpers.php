<?php 

/*-----------------------------------------------------------------------------------

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file,
	When things go wrong, they tend to go wrong in a big way.
	You have been warned!

-------------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------*/
/*  Generate Icons List
/*-----------------------------------------------------------------------------------*/
function theme_icons(){
  $pattern = '/\.(icon-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
  $subject = file_get_contents(THEME_DIR.'/assets/css/font-awesome.css');

  preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

  $icons = array();

  foreach($matches as $match){
      $icons[] = $match[1];
  }

  return $icons;
}



/*-----------------------------------------------------------------------------------*/
/*  Set Class
/* ----------------------------------------------------------------------------------*/
function setClass($classes){

  if($classes){
    $return = '';
    foreach($classes as $class)
    {
        if(trim($class))
        $return .= trim($class).' ';
    }
    if(trim($return) != '')
    return ' class="'.trim($return).'"';
 }

}



/*-----------------------------------------------------------------------------------*/
/*  Set ID
/* ----------------------------------------------------------------------------------*/
function setId($id = false, $fallback_id = false){

  if($id)
    return ' id="'.trim($id).'"';

  if(!$id && $fallback_id)
    return ' id="'.trim($fallback_id).'"';
  
}



/*-----------------------------------------------------------------------------------*/
/*  Set Animation
/* ----------------------------------------------------------------------------------*/
function setAnimation($animation = false){

  if($animation && !md_detect_user_agent('mobile'))
    return ' data-animation="'.$animation.'"';

}



/*-----------------------------------------------------------------------------------*/
/*  Detect User Agent
/* ----------------------------------------------------------------------------------*/
function md_detect_user_agent ( $type = NULL ) {
        $user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
        if ( $type == 'bot' ) {
                // matches popular bots
                if ( preg_match ( "/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent ) ) {
                        return true;
                        // watchmouse|pingdom\.com are "uptime services"
                }
        } else if ( $type == 'browser' ) {
                // matches core browser types
                if ( preg_match ( "/mozilla\/|opera\//", $user_agent ) ) {
                        return true;
                }
        } else if ( $type == 'mobile' ) {
                // matches popular mobile devices that have small screens and/or touch inputs
                // mobile devices have regional trends; some of these will have varying popularity in Europe, Asia, and America
                // detailed demographics are unknown, and South America, the Pacific Islands, and Africa trends might not be represented, here
                if ( preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
                        // these are the most common
                        return true;
                } else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
                        // these are less common, and might not be worth checking
                        return true;
                }
        }
        return false;
}
