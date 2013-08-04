<?php

function __autoload($class_name)
{
	$directories = array(
		'./class/',
		'./class/entity/',
		'./class/repository/'
	);
	foreach ($directories as $directory) {
		if (file_exists($directory . $class_name . '.php')) {
			require_once($directory . $class_name . '.php');
			return;
		}
	}
}

?>
