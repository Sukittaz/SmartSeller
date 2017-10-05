<?php
require 'environment.php';

global $config;

if(ENVIRONMENT == 'development') {
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'smartseller');
	define('DB_USER', 'root');
	define('DB_PASS', '');
} else {
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'cms');
	define('DB_USER', 'root');
	define('DB_PASS', '');
}

$config['default_lang'] = 'pt-br';
?>