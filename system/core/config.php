<?php
	FB::info('Config Loaded');
	//Paths System
	
	define('PATH_CORE', 'system/core/');
	define('PATH_HELPER', 'system/helper/');
	define('PATH_LIB', 'system/lib/');
	//Paths APP
	define('PATH_CONTROLLER', 'app/controller/');
	define('PATH_MODEL', 'app/model/');
	define('PATH_DAO', 'app/dao/');
	define('PATH_VIEW', 'app/view/');
	define('PATH_TEMPLATE', 'app/view/template/');
	//Paths UI
	define('PATH_UI_IMG', '/ui/img/');
	define('PATH_UI_CSS', '/ui/css/');
	define('PATH_UI_JS', '/ui/js/');
	//Database
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'SGA');
	define('DB_USER', 'postgres');
	define('DB_PASS', '1234');
	define('DB_PORT', 5432);
	//Regras Nomenclatura
	//Model - Classe ->  Classe.php
	//Controller - ClasseController -> ClasseController.php
	//DAO - ClasseDAO -> ClasseDAO.php
	//VIEW - view-name.php
?>