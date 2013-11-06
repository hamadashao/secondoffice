<?php

return searchForModules();

function searchForModules(){	
	$arr = array();
	
	foreach (glob(dirname(dirname(__FILE__)).'/modules/*', GLOB_ONLYDIR) as $moduleDirectory) 
	{
		array_push($arr, basename($moduleDirectory));
    }
	
	return $arr;
}

?>