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

use App\Core\ViewClass;
// -----------------------------------------------------------------------------------------------------------------------------=
class Config
{
	private $linkdb 	= '../app/Config/Database.php';
	private $linktp 	= '../app/Config/Template.php';
	private $linkmodel 	= '../app/Theme/config/Model.php';
	private $linkcl 	= '../app/Theme/config/Controller.php';
	private $view;

	public function index()
	{
		$listlogin 	= self::getlistfile('login');
		$listadmin 	= self::getlistfile('admin');
		$db 	= self::getdatabase();
		$tp 	= self::gettemplate();
		require_once '../app/Theme/config/hal_config.php';
	}

	public function getclassview()
	{
		$this->view = new ViewClass();
	}

	public function getfile($link)
	{
		// buka file dengan perintah fopen
		$FileHandle = fopen($link, 'r') or die("File tidak bisa dibuka");

		// membaca file dengan perintah fread sserta ukuran file ditentukan dengan filesize
		$data = fread($FileHandle, filesize($link));
		// menutup file agar tidak crash
		fclose($FileHandle);
		return $data;
	}

	public function replacefile($file,$filebaru)
	{
		// tulis ulang kedalam file dokumen
		$FileHandle2 = fopen($file, 'w') or die("File gagal dibuka");
		fwrite($FileHandle2, $filebaru);
		fclose($FileHandle2);
	}

	public function autocoding($value='')
	{
		if ($_POST['model'] == 'ya' || $_POST['hapus'] == 'ya') {
			if ($_POST['model'] == 'ya') {
				$db 	= self::getdatabase();
				if ($db[4] == '') {
					notif('Database belum diisi','config');
				}
				$koneksi 	= new Database();
				$sql 		= $koneksi->query("show tables");
				$file 		= $this->linkmodel;
				foreach ($sql as $row) {
					$namaClass 	= ucfirst($row[0]);
					$filebaru 	= "../app/Models/" . $namaClass . '_Model.php'; 
					if (!file_exists($filebaru)) {
						copy($file, $filebaru);
						$dfile 		= self::getfile($filebaru);
						$afile 		= explode('Model extends', $dfile);
						$nfile 		= implode("$namaClass extends", $afile);
						self::replacefile($filebaru, $nfile);
					}
				}
			}

			if ($_POST['hapus'] == 'ya') {
				$model 	= scandir('../app/Models');
				$filter = ['Fc','Guide','Home'];
				for ($i=2; $i < count($model); $i++) { 
					$amodel 	= explode('_', $model[$i]);
					if (!in_array($amodel[0], $filter)) {
						$ufile = '../app/Models/'.$amodel[0].'_Model.php';
						if (file_exists($ufile)) {
						unlink('../app/Models/'.$amodel[0].'_Model.php');
						}
					}
				}
			}
			notif('Konfigurasi Model Berhasil','config');
		}else{
			redirect('config');
		}
	}

	public function settingDatabase()
	{
		$file 	= $this->linkdb;
		$data 	= self::getfile($file);
		$kata 	= explode('define',$data);
		for ($i=0; $i < count($kata); $i++) {
			if ($i == 0)
			 	$a[]	= $kata[$i];
			else{
				$darray 	= explode(' ', $kata[$i]);
				$narray[] 	= $darray[0];
				$narray[]	= "'".$_POST['db'][$i]."'";
				$narray[]	= $darray[2];
				$a[]		= implode(' ', $narray);
				$narray 	= null;
			}
		}
		$filebaru 	= implode('define', $a);
		$this->replacefile($file,$filebaru);
		notif('Konfigurasi berhasil','config/index');
	}

	public function settingView($view)
	{
		$file 	= "../app/Views/". $_POST['link'] . ".php";
		$data 	= self::getfile($file);
		$kata 	= explode('view.content',$data);
		if (count($kata) == 2) {
				
			switch ($view) {
				case 'tampil':
					$tfile = "../app/Theme/template/tampil_" . $_POST['tampil'] . ".php";
					$tdata 	= self::getfile($tfile);
					break;
				
				default:
					warning('Konfigurasi tidak ditemukan!');
					break;
			}
			$b[]	= $kata[0];
			$b[]	= $tdata;
			$b[]	= $kata[1];
			$nfile 	= implode("\t", $b);
			self::replacefile($file, $nfile);
			notif('Konfigurasi Templat view content berhasil','config');
		} else
			notif('Maaf, File tidak didukung. periksa persyaratan penggunaan content','config');
	}

	public function getdatabase()
	{
		$file 	= $this->linkdb;
		$data 	= self::getfile($file);
		$kata 	= explode('define',$data);
		// echo array_search("'DB_HOST',", $kata);
		for ($i=1; $i < count($kata); $i++) {
				$darray 	= explode(' ', $kata[$i]);
				$d[]		= ltrim(rtrim($darray[1], "'"),"'");
		}
		return $d;
	}

	public function settingtemplate($sistem)
	{
		switch ($sistem) {
			case 'admin':
				$id_sistem = 1; 
				break;
			case 'home':
				$id_sistem = 2; 
				break;
			case 'login':
				$id_sistem = 3;
				break;
			default:
				notif('kode template tidak terdefinisi','config');
				break;
		}
		$file 	= self::getfile($this->linktp);
		$data 	= explode('define', $file);
		$nsistem 	= $_POST[$sistem];
		for ($i=0; $i < count($data); $i++) {
			if ($i == $id_sistem){
				$darray 	= explode(' ', $data[$i]);
				for ($j=0; $j < count($darray); $j++) { 
					if ($j == 1) {
						if ($sistem == 'FALSE')
							$narray[] = $nsistem;
						else
							$narray[] = "'" . $nsistem . "'";
					}else{
						$narray[] = $darray[$j];
					}
				}

				$a[]		= implode(' ', $narray);
				$narray 	= null;
			} else
				$a[] 		= $data[$i];
		}
		if ($sistem == 'admin' AND $nsistem != 'FALSE') {
			$filecl 	= $this->linkcl;
			$filebaru 	= "../app/Controllers/AdminController.php"; 
			if (!file_exists($filebaru)) {
				copy($filecl, $filebaru);
				$dfile 		= self::getfile($filebaru);
				$afile 		= explode('Controller extends', $dfile);
				$nfile 		= implode("AdminController extends", $afile);
				self::replacefile($filebaru, $nfile);
			}
		}
		$filebaru 	= implode('define', $a);
		$this->replacefile($this->linktp,$filebaru);
		self::getclassview();
		$this->view->getsetting($sistem, $nsistem);
		notif('Template berhasil di setting','config/index');
	}

	public function gettemplate()
	{
		$file 	= self::getfile($this->linktp);
		$data 	= explode('define', $file);
		for ($i=1; $i < count($data); $i++) {
			$darray 	= explode(' ', $data[$i]);
			$d[]		= ltrim(rtrim($darray[1], "'"),"'");
		}

		return $d;
	}

	public function getlistfile($folder)
	{
		$folder = "../app/Theme/". $folder;
		if (!file_exists($folder)) {
			warning('Folder tidak ditemukan!');
		}
		$listf 	= scandir($folder);
		$ffolder= $folder . "_";
		for ($i=2; $i < count($listf); $i++) {
			$darray 	= explode('_', $listf[$i]); 
			$dlist[] 	= rtrim($darray[1],'.php');
		}
		return array_unique($dlist);
	}

	public function addcontroller()
	{
		$namaController 	= $_POST['controller'];
		if (preg_match("/ /", $namaController)) {
			notif('Nama Controller tidak boleh mengandung spasi','config');
		}else{
			$trim 				= trim($namaController);
			$filter 			= filter_var($trim, FILTER_SANITIZE_STRING);
			$namaController 	= ucfirst(strtolower(addslashes($filter)));
			
			$filecl 	= $this->linkcl;
			$filebaru 	= "../app/Controllers/".$namaController."Controller.php"; 
			if (!file_exists($filebaru)) {
				copy($filecl, $filebaru);
				$dfile 		= self::getfile($filebaru);
				$afile 		= explode('Controller extends', $dfile);
				$nfile 		= implode($namaController."Controller extends", $afile);
				self::replacefile($filebaru, $nfile);
				notif('Controller berhasil ditambahkan','config');
			}else
				notif('Nama Controller Sudah Ada !','config');
		}
	}

	public function addmodel()
	{
		$namaModel 	= $_POST['model'];
		if (preg_match("/ /", $namaModel)) {
			notif('Nama Model tidak boleh mengandung spasi','config');
		}else{
			$trim 		= trim($namaModel);
			$filter 	= filter_var($trim, FILTER_SANITIZE_STRING);
			$namaModel 	= ucfirst(strtolower(addslashes($filter)));
			
			$file 		= $this->linkmodel;
			$filebaru 	= "../app/Models/".$namaModel."_Model.php"; 
			if (!file_exists($filebaru)) {
				copy($file, $filebaru);
				$dfile 		= self::getfile($filebaru);
				$afile 		= explode('Model extends', $dfile);
				$nfile 		= implode($namaModel." extends", $afile);
				self::replacefile($filebaru, $nfile);
				notif('Model berhasil ditambahkan','config');
			}else
				notif('Nama Model Sudah Ada !','config');
		}
	}
}