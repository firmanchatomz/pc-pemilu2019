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

// -------------------------------------------------------------------------------------------------

namespace app\Core;

// -------------------------------------------------------------------------------------------------

class ViewClass
{
	// variabel out the zona

	// property Template
	private $admin 		= null;
	private $home 		= null;
	private $login 		= null;

	// directory
	private $dadmin 	= '../app/Views/Administrator';
	private $dhome 		= '../app/Views/Homepage';
	private $dir 			= '../app/Views/';

// ############################################################################
// FUNCTION for view
	public function getview($value='')
	{
		global $view;
		return $view;
	}

	public function getdatamanage()
	{
		$sesi = session_data_manage();
		if ($sesi) {
			return $_SESSION[$sesi];
		}
	}

		//Fungsi untuk memanggil library
	public function library($library)
	{
		require_once '../app/Libraries/'.ucfirst($library).'_Lib.php';
		$library = 'app\Libraries\\' . $library;
		return new $library();
	}

	public function getdatalanding()
	{
		$sesi = session_data_landing();
		if ($sesi) {
			return $_SESSION[$sesi];
		}
	}

	public function single($view, $data=null)
	{
		$chart = self::library('Chart');
		$resource = self::setresources();
		extract($resource);

		if (!is_null($data))
			extract($data);
		if ( file_exists('../app/Views/'.$view.'.php') ) {
			require_once '../app/Views/'.$view.'.php';
		}else{
			echo 'halaman tidak ada';
		}
	}


	public function manage($view,$data=[])
	{
		$path = $this->getview();
		$path = $path['manage']; 		
		if (is_array($path)) {
			if (file_exists($this->dir . $path[0].'.php') AND file_exists($this->dir . $path[1] . '.php')) {
			 	if (file_exists('../app/Views/' . $view . '.php')) {
			 		self::single($path[0],self::getdatamanage());
					self::single($view, $data);
					self::single($path[1],self::getdatamanage());
			 	}else
			 		require_once $this->link_error;
			} else
				warning('File view in config is not Configuration','directory Administrator/file tamplate');
		}
	}

	public function landing($view,$data=[])
	{
		$path = $this->getview();
		$path = $path['landing']; 		
		if (is_array($path)) {
			if (file_exists($this->dir . $path[0].'.php') AND file_exists($this->dir . $path[1] . '.php')) {
			 	if (file_exists('../app/Views/' . $view . '.php')) {
			 		self::single($path[0],self::getdatalanding());
					self::single($view, $data);
					self::single($path[1],self::getdatalanding());
			 	}else
			 		require_once $this->link_error;
			} else
				warning('File view in config is not Configuration','directory Home/file tamplate');
		}
	}

	// percobaan resource
	public function setresources($value='')
	{
		$path_resources 	= '../app/Core/Resources/General';
		$folder 	= scandir($path_resources);
		// calling name file in resources 
		for ($i=2; $i <= count($folder)-1; $i++) {
			$nama_file 		= rtrim($folder[$i],'.php');
			$class 				= "app\Core\Resources\General\\".$nama_file;
			$data[strtolower($nama_file)]	= new $class();
		}		
		return $data;
	}

// END FUNCTION FOR VIEW
// ############################################################################

	public function getsetting($sistem,$nsistem)
	{
		switch ($sistem) {
			case 'admin':
				$this->admin 	= $nsistem;
				if ($this->admin != 'FALSE')
					self::dirAdmin();
				break;
			case 'home':
				$this->home 	= $nsistem;
				if ($this->home != 'FALSE')
					self::dirHome();
				break;
			case 'login':
				$this->login 	= $nsistem;
				if ($this->login != 'FALSE')
					self::themeLogin();
				break;
		}
	}

	public function dirAdmin()
	{
		if (is_dir($this->dadmin) == null) {
			mkdir($this->dadmin);
		}
		self::themeAdmin();
	}


	public function dirHome()
	{
		if (is_dir($this->dhome) == null) {
			mkdir($this->dhome);
		}
		self::themeHome();
	}

	public function themeLogin()
	{
		$this->login 	= strtolower($this->login);
		$linksource 	= '../app/Theme/login/login_' . $this->login . '.php';
		$linkdesti 		= '../app/Views/login_' . $this->login . '.php';
		if (file_exists($linksource)) {
			if (!file_exists($linkdesti))
				copy($linksource, $linkdesti);
			else
				notif('Template Login Sudah ada','config');
		} else
			warning('Cek Kembali Konfigurasi Login Theme','config.php');
	}

	public function themeAdmin()
	{
		$linksourceh 	= '../app/Theme/admin/header_' . $this->admin . '.php';
		$linksourcef 	= '../app/Theme/admin/footer_' . $this->admin . '.php';
		$linkdestih 	= $this->dadmin . '/header_' . $this->admin . '.php';
		$linkdestif 	= $this->dadmin . '/footer_' . $this->admin . '.php';

		self::cektheme($linksourceh, $linksourcef, $linkdestih, $linkdestif);
	}

	public function themeHome()
	{
		$linksourceh 	= '../app/Theme/homepage/header_' . $this->home . '.php';
		$linksourcef 	= '../app/Theme/homepage/footer_' . $this->home . '.php';
		$linkdestih 	= $this->dhome . '/header_' . $this->home . '.php';
		$linkdestif 	= $this->dhome . '/footer_' . $this->home . '.php';

		self::cektheme($linksourceh, $linksourcef, $linkdestih, $linkdestif);
	}

	public function cektheme($linksourceh, $linksourcef, $linkdestih, $linkdestif)
	{
		if (file_exists($linksourceh) AND file_exists($linksourcef)) {
			if (!file_exists($linkdestih) AND !file_exists($linkdestih)) {
				copy($linksourceh, $linkdestih);
				copy($linksourcef, $linkdestif);
			} else 
				notif('Template sudah ada','config');
		} else
			warning('Cek Kembali Konfigurasi Template');
	}
}