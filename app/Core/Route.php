<?php 
/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Firman Setiawan
 * @copyright      Copyright (c) Firman Setiawan
 */

// ------------------------------------------------------------------------------------------------------------------------------

namespace app\Core;

use app\Core\databasePdo;
use app\Controllers\Middle\MiddleController;
// -----------------------------------------------------------------------------------------------------------------------------=
class Route
{
	private $middle;
	protected $controller = 'HomeController';
	protected $method 		= 'index';
	protected $params 		= [];
	function __construct()
	{
		require_once '../app/Controllers/Middle/MiddleController.php';
		$this->middle = new MiddleController();
		self::MiddleProcess();

		// path controller
	}

	public function MiddleProcess($value='')
	{
		
		$url 	= $this->parseURL();
		if (strtolower($url[0]) == 'config') {
			$this->controller = 'config';
			require_once '../app/Core/Config.php';
			$this->controller 	= 'app\Core\\' . $this->controller;
			
			self::methodpath($url);
			
		} else {
			if (!empty($url[0])) {
				$controller = $url[0];

						// cek file controller in directory
				if(file_exists('../app/Controllers/' . ucfirst($controller) . 'Controller.php')){
					$this->controller = ucfirst($controller).'Controller';
				}
			}
			$controller = $this->middle->checkSession($this->controller);
			self::controllerPath($url,$controller);
		}
	}

	public function parseURL()
	{
		if ( isset($_GET['url']) ) {
			$url 	= rtrim($_GET['url'],'/');
			$url 	= explode('/', $url);
			for ($i=0; $i < count($url); $i++) { 
				if ($i < 2) {
					$Newurl[]	= filter_var(trim($url[$i]), FILTER_SANITIZE_URL);
				} else {
					$Newurl[] = $url[$i];
				}
			}
			return $Newurl;
		}
	}

	public function controllerPath($url,$controller)
	{
		// process calling file in direktory
		require_once '../app/Controllers/'. $controller.'.php';
		$this->controller 	= 'app\Controllers\\' . $controller;
		self::methodpath($url);
	}

	public function methodpath($url)
	{
		// process delete index array controller
		unset($url[0]);
		$this->controller 	= new $this->controller;

		// method 
		if ( isset($url[1]) ) {
			if ( method_exists($this->controller, $url[1]) ) {
				$this->method = $url[1];
			}
		// process delete index array method
			unset($url[1]);
		}
		// param
		if (!empty($url)) {
			// change sort array to index 0 or original index array default
			$url = array_values($url);
			// process modification url parameter
			$url = implode('/', $url); //merge parameter of slash
			$url = explode('=/', $url); // split parameter for one parameter or many parameter

			// process change parameter enkripsi to parameter original
			for ($i=0; $i < count($url); $i++) { 
				$spaceUrl 	= $this->paramsPlus($url[$i]);
				$Newurl[]	= $this->decrypt($spaceUrl);
			}

			// this is parameter, parameter can be many parameters
			$this->params = $Newurl;
		}
		// execute controller, method and params
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	// funtion decrypt paramater
	public function decrypt( $q ) {
	    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
	    return( $qDecoded );
	}

	// put icon + of parameter
	public function paramsPlus($param)
	{
		$spaceUrl 			= explode(' ', $param);
		$spaceUrl 			= implode('+', $spaceUrl);
		return $spaceUrl;
	}

}