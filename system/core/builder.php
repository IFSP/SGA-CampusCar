<?php
	FB::info('Builder Loaded');
	//Set's UTF8
	ini_set('default_charset','UTF-8');
	//Load Config
	require('system/core/config.php');	
	//Load Classes
	require(PATH_CORE . 'Route.php');
	require(PATH_CONTROLLER . 'Controller.php');
	
	function __autoload($class) {
		if(file_exists(PATH_MODEL.$class.'.php'))
			require(PATH_MODEL.$class.'.php');
		else if(file_exists(PATH_DAO.$class.'.php'))
			require(PATH_DAO.$class.'.php');
		else if(file_exists(PATH_HELPER.$class.'.php'))
			require(PATH_HELPER.$class.'.php');
	}
	$start = new Route;
	$start->run();
?>