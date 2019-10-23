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

use app\Core\ViewClass;

// -------------------------------------------------------------------------------------------------

class Controller
{
	public $view;
	private $link_error = '../app/Theme/error/404.php';
	protected $header 	= null;
	protected $data 		= null;
	protected $footer 	= null;

	function __construct()
	{
		$this->view = new ViewClass();
	}
// ###########################################################################################
// FUNCTION FOR VIEW

// END FUNCTION VIEW
// ###########################################################################################

	public function printPage($view, $data=[])
	{
		
		$pdf = self::library('pdf');
		if ( file_exists('../app/Views/'.$view.'.php') ) {
			require_once '../app/Views/'.$view.'.php';
		}else{
			require_once $this->link_error;
		}
	}

	//Fungsi untuk memanggil model
	public function model($model=null)
	{
		if (empty($model))
			$model = 'fc';
		require_once '../app/Models/'.ucfirst($model).'_model.php';
		$model 	= 'app\Models\\' . $model;
		return new $model();
	}

	//Fungsi untuk memanggil library
	public function library($library)
	{
		require_once '../app/Libraries/'.ucfirst($library).'_Lib.php';
		$library = 'app\Libraries\\' . $library;
		return new $library();
	}

	//Fungsi untuk mengalihkan kehalaman lain
	public function redirect($link)
	{
		$path = site_url($link);
		header("location: $path");
	}

	//Fungsi untuk mendefinisikan halaman header page
	public function setHeader($header)
	{
		$this->header 		= $header;
	}

	//Fungsi untuk mendefinisikan halaman footer page
	public function setFooter($footer)
	{
		$this->footer 		= $footer;
	}

	// Fungsi untuk mendefinisikan data
	public function setData($data)
	{
		$this->data 		= $data;
	}

	// Fungsi mengambil data yang disetting untuk tempate admin dan homepage
	public function GetData()
	{
		return $this->data;
	}

	//Fungsi untuk memanggil method setheader
	public function getHeader($data=null)
	{
		if (!isset($this->header))
			warning('Link Header belum terdefinisi','$this->setheader');
		self::view($this->header, $data);
	}

	//Fungsi untuk memanggil method setfooter
	public function getFooter($data=null)
	{
		if (!isset($this->footer))
			warning('Link Footer belum terdefinisi','$this->setfooter');
		self::view($this->footer, $data);
	}

	//Fungsi untuk menampilkan halaman yang komplek (terdiri dari header, page dan footer)
	public function page($view,$data=NULL){
		self::getheader($this->data);
		self::view($view, $data);
		self::getfooter($this->data);
	}

	//Fungsi untuk menampilkan jendela Pop Up
	public function popup($pesan,$link){
		$popup = "<script language='javascript'>
	    		window.alert('".$pesan."');
	    		window.location.href='".site_url($link)."';
	    		</script>";
	    echo $popup;
	}

	//Fungsi untuk mengecek status data CUD
	public function checkcud($cud,$check,$link)
	{
		$info 	= ['create' => 'di Simpan','update' => 'di Perbaharui', 'delete' => 'di Hapus'];
		if (array_key_exists($cud, $info))
			$status 	= $info[$cud];	
		else warning('Input CUD yang sesuai');
		if ($check)
			echo self::popup("Data Berhasil $status",$link);
		else
			echo self::popup("Data Gagal $status",$link);
	}
}