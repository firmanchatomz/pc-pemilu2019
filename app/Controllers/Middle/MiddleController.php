<?php
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

namespace app\Controllers\Middle; // package untuk class HomeController


use app\Core\Controller;


// Controller class system
class MiddleController extends Controller
{
	private $controllerHome 	= 'HomeController';
	private $controllerManage = 'AdminController';
	private $session;
// ##############################################################################pengecekan session
// This FUNCTION is not deleted, because it is very important 
	// session checking
	public function checkSession($controller=null)
	{
		// if output this funtion FALSE, then redirect to controller default
		return $this->controllerHome;
	}

	public function datamanage($value='')
	{
		$sesi 						= session_data_manage();
		if (!$sesi) {
			$_SESSION[$sesi] = null;
		} else {
			$data['admin'] 		= $this->model('admin')->listadminsetsession(); 
			$data['person']		= $this->model('person')->getadminsetperson();
			$_SESSION[$sesi] = $data;
		}
	}

	public function datalanding($value='')
	{
		$sesi 						= session_data_landing();
		if (!$sesi) {
			$_SESSION[$sesi] = null;
		} else {
			$data['setting'] = Db::readlast('setting');
			$_SESSION[$sesi] = $data;
		}
	}

	public function redirect($value='')
	{
		$path = base_url().$link;
		header("location: $path");
		exit();
	}
}
