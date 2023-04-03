<?php

//  Project constants
define('NAMESPACE_PREFIX', 'es\\ucm\\fdi\\aw\\');
define('PROJECT_ROOT', dirname(__DIR__));
define('INCLUDES_ROOT', PROJECT_ROOT . '\\includes');
define('IMAGES_ROOT', PROJECT_ROOT . '\\images');

//  Database constants
define('DATABASE_HOST', 'localhost');
define('DATABASE_NAME', 'zeus_airsoft');
define('DATABASE_USERNAME', 'default_user');
define('DATABASE_PASSWORD', 'unacontrasenyamuyperoquemuylarga');

//  Locale configuration
ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');

//  Allow namespace to autoimport correct classes and files
spl_autoload_register(function ($class) {
	$namespaceLength = strlen(NAMESPACE_PREFIX);

	if (strncmp(NAMESPACE_PREFIX, $class, $namespaceLength) !== 0)
		return;

	// Get the relative class name
	$relativeClass = substr($class, $namespaceLength);

	/*  Replace the namespace prefix with the base directory
            Replace namespace separators with directory separators in the relative class name
            Append with .php
        */

	$file = INCLUDES_ROOT . '/' . str_replace('\\', '/', $relativeClass) . '.php';

	// If the file exists, require it
	if (file_exists($file)) {
		require $file;
	}
});

    //  Application initialisation
    //  TODO

session_start();