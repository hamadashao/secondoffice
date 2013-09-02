<?php

return searchForModules();

function searchForModules(){

	//$arr = array();

	/* add your modules dynamically here */
	
	$arr = array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	);

	return $arr;
}

?>