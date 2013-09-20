<?php
	session_start();
	//Start Fire PHP
	ob_start();
	require('system/lib/fire-php/fb.php');
	//Debug on/off
	FB::setEnabled(true);
	FB::info('Index Loaded');
	require('system/core/builder.php');
	
	
	
	