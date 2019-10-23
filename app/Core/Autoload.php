<?php 
// define('BASEPATH', TRUE);
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Firman Setiawan
 * @copyright      Copyright (c) Firman Setiawan
 */

// ----------------------------------------------------------------------------------------------------------

// pemanggilan directory class
use App\Core\Controller;
use Libraries\Form;

// $GLOBALS['database'] = $Database;

// identifikasi class kedalam variabel $controller_auto
$controller_auto 	= new Controller();


## -------------------------------------------------------------------------------
## version 1.9 
## -------------------------------------------------------------------------------

function session_data_manage()
{
		global $Session;
		$data_manage = $Session['data']['data_manage'];
		if ($data_manage != '')
			return sha1($data_manage); // create random text for security
		else
			return FALSE;
}

function session_data_landing()
{
		global $Session;
		$data_landing = $Session['data']['data_landing'];
		if ($data_landing != '')
			return sha1($data_landing); // create random text for security
		else
			return FALSE;
}


// this function for called view in class controller
// -------------------------- VIEW -----------------------------------------------
function view($view, $data=[]) {
	global $controller_auto;
	// if (BASEPATH == FALSE) $controller_auto = null;
	return $controller_auto->view($view, $data);
}

// -------------------------------------------------------------------------------

// this function for called adminpage in class controller
// -------------------------- ADMIN PAGE -----------------------------------------------
function adminpage($view, $data=[]) {
	global $controller_auto;
	// if (BASEPATH == FALSE) $controller_auto = null;
	return $controller_auto->adminpage($view, $data);
}

// -------------------------------------------------------------------------------

// this function for called homepage in class controller
// -------------------------- HOME PAGE -----------------------------------------------
function homepage($view, $data=[]) {
	global $controller_auto;
	// if (BASEPATH == FALSE) $controller_auto = null;
	return $controller_auto->homepage($view, $data);
}

// -------------------------------------------------------------------------------

// this function for called adminpage in class controller
// -------------------------- PAGE -----------------------------------------------
function page($view, $data=[]) {
	global $controller_auto;
	// if (BASEPATH == FALSE) $controller_auto = null;
	return $controller_auto->page($view, $data);
}

// -------------------------------------------------------------------------------

// this function for called model in class controller
// -------------------------- VIEW -----------------------------------------------
function model($model=null) {
	global $controller_auto;

	return $controller_auto->model($model);
}

// -------------------------------------------------------------------------------

// this function for called popup in class controller
// -------------------------- VIEW -----------------------------------------------
function notif($pesan, $link) {
	global $controller_auto;

	return $controller_auto->popup($pesan, $link);
}

// -------------------------------------------------------------------------------

// this function for called popup in class controller
// -------------------------- VIEW -----------------------------------------------
function redirect($link) {
	global $controller_auto;

	return $controller_auto->redirect($link);
}

// -------------------------------------------------------------------------------

## AUTOLOAD SYSTEM
## THIS FUNTION for all class system
## this is funtion system
## !important for not modified

// ---------------------------- WARNING -----------------------------------------
function warning($teks, $info=null) {
	if (!is_null($info))
		$info = ' - <i>(' . $info . ')</i>';
	echo "<b>Chatomz Berkata : </b>" . $teks . $info;
	die();
}

// -----------------------------------------------------------------------------

## AUTOLOAD BASE_URL
## THIS FUNTION for all class system
## this is funtion system
## !important for not modified

// ---------------------------- WARNING -----------------------------------------

function base_url($link= null) {
	global $Url;
	if (is_null($link)) return $Url['BASE_URL']; 
	
	return $Url['BASE_URL'] . $link;
}


function site_url($link= null) {
	global $Url;
	if (is_null($link)) return $Url['BASE_URL']; 
	
	// cek url
	$alink 	= explode('/', $link);
	if (count($alink) > 1) {

		$link 	= $alink[0] . '/' . $alink[1].'/';
		if (count($alink) > 2) {
			for ($i=2; $i < count($alink); $i++) { 
				$link .= encrypt($alink[$i]) . '/';
			}
			$link = rtrim($link,'/');
		}

	}

	return $Url['BASE_URL'] . $link;
}

function encrypt( $p ) {
	$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $p, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
	return $qEncoded;
}

// -----------------------------------------------------------------------------
//conn/library.php
#isinya adalah fungsi standar untuk pengiriman pesan sukses/error
#fungsi-fungsi kit tambahan lainnya juga bisa sekalian dimasukkan disini

function create_alert($type, $pesan,$color='warning'){
	$_SESSION['adm-type'] = $type;
	$_SESSION['adm-message'] = $pesan;
	$_SESSION['adm-color'] = $color;
}

function show_alert(){
	if(isset($_SESSION['adm-type'])){
		$type = ucfirst($_SESSION['adm-type']);		
		unset($_SESSION['adm-type']);
		$message = $_SESSION['adm-message'];
		unset($_SESSION['adm-message']);
		$color = $_SESSION['adm-color'];		
		unset($_SESSION['adm-color']);

		return "
		<div class='alert alert-".$color." alert-dismissible fade show' role='alert'>
		  <strong>".$type."!</strong> <small>".$message." .</small>
		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    <span aria-hidden='true'>&times;</span>
		  </button>
		</div>
		";
	}
}