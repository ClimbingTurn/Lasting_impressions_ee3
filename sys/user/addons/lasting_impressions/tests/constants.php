<?php

$system_path = realpath(__DIR__ . "/../../../../");

if (realpath($system_path) !== FALSE)
{
	$system_path = realpath($system_path).'/';
}

// The PHP file extension
define('EXT', '.php');

// ensure there's a trailing slash
$system_path = rtrim($system_path, '/').'/';

define('SYSPATH', $system_path);
define('APPPATH', $system_path.'ee/legacy');

// Path to the system folder
define('BASEPATH', str_replace("\\", "/", $system_path.'codeigniter/system/'));

define('PATH_ADDONS', SYSPATH . 'user/addons/');
define('PATH_MOD', SYSPATH.'ee/ExpressionEngine/Addons/');

// echo PATH_MOD . "\r\n";
// die();