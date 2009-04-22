<?php

function browser_detection( $which_test ) {

	// initialize the variables
	$browser = '';
	$dom_browser = '';

	// $browser has an obvious use, $dom_browser, not so much
	// $dom_browser is a guess as to whether the browser supports accessing the DOM via javascript.

	// set to lower case to avoid errors, check to see if http_user_agent is set
	$navigator_user_agent = ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) ? strtolower( $_SERVER['HTTP_USER_AGENT'] ) : '';

	// run through the main browser possibilities, assign them to the main $browser variable
	if (stristr($navigator_user_agent, "opera")) 
	{
		$browser = 'opera';
		$dom_browser = true;
	}

	elseif (stristr($navigator_user_agent, "msie 4")) 
	{
		$browser = 'msie4'; 
		$dom_browser = false;
	}

	elseif (stristr($navigator_user_agent, "msie")) 
	{
		$browser = 'msie'; 
		$dom_browser = true;
	}

	// KHTML will match for any WebKit (Safari, Chrome, etc.) or KHTML (Konqueror) browser
	elseif ((stristr($navigator_user_agent, "khtml"))) 
	{
		$browser = 'safari'; 
		$dom_browser = true;
	}

	elseif (stristr($navigator_user_agent, "gecko")) 
	{
		$browser = 'mozilla';
		$dom_browser = true;
	}
	
	elseif (stristr($navigator_user_agent, "mozilla/4")) 
	{
		$browser = 'ns4';
		$dom_browser = false;
	}
	
	else 
	{
		$dom_browser = false;
		$browser = false;
	}

	// return the test result you want
	if ( $which_test == 'browser' )
	{
		return $browser;
	}
	elseif ( $which_test == 'dom' )
	{
		return $dom_browser;
		//  note: $dom_browser is a boolean value, true/false, so you can just test if
		// it's true or not.
	}
}

?>
