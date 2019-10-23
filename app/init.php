<?php
session_start();

/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Firman Setiawan
 * @copyright      Copyright (c) Firman Setiawan
 *
 * ---------------------------------------------------------------------------------------------------------------
 */

// ---------------------------------------------------------------------------------------------------------------
// scan file dalam direktori Config

$link 		= ['Config','Helpers','Core/Resources/System','Core/Resources/General'];

// ---------------------------------------------------------------------------------------------------------------

for ($x=0; $x < count($link); $x++) {
	$folder 	= scandir(__DIR__ . '/'.$link[$x]);
	// pemanggilan file dalam folder otomatis 
	for ($i=2; $i <= count($folder)-1; $i++) {
		require_once __DIR__ . '/'.$link[$x].'/' . $folder[$i];
	}
}

// ---------------------------------------------------------------------------------------------------------------

spl_autoload_register(function( $class ){
	global $view;
	$class = explode('\\', $class);
	$class = end($class);
	require_once 'Core/' . $class . '.php';
});
require_once 'Core/Autoload.php';
require_once 'Models/Resources/Db.php';
