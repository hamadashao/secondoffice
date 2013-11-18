<?php

return searchForModules();

function searchForModules(){	
	$arr = array();
	
	foreach (glob(dirname(dirname(__FILE__)).'/modules/*', GLOB_ONLYDIR) as $moduleDirectory) 
	{
		array_push($arr, basename($moduleDirectory));
    }
	
		
	$gii = array("gii" => array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			'ipFilters'=>array('127.0.0.1','::1')
		));
	
	$arr = array_merge($arr, $gii);
	
	return $arr;
}

?>