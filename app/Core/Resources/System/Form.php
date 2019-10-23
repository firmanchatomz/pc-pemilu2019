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

namespace app\Core\Resources\System;

// -------------------------------------------------------------------------------------------------

class Form
{
	private $set, $alert;

	public function setfile($set)
	{
		$this->set = $set;

	}

	public function process_file()
	{
		$set 						= $this->set;
		$name 					= $set['post'];
		$error_file 		= $_FILES[$name]['error'];
		$type_file 			= $_FILES[$name]['type'];
		$size_file 			= $_FILES[$name]['size'];
		$lokasi_file 		= $_FILES[$name]['tmp_name'];
		// cek kondisi error file
		if ($error_file == 0) {
			// proses cek type file
			$nt = 0; // nilai penentu
			for ($i=0; $i < count($set['type']); $i++) {
				$type 	= $set['file'] . '/' . $set['type'][$i]; 
				if ($type_file == $type)
						$nt = $nt + 1;
			}
			// if $nt bernilai 0 maka type tidak ada yang sesuai dengan set
			if ($nt != 0) {
				// proses cek ukuran file
				if ($size_file < $set['size']) {
					// proses moveupload
					if (isset($set['move'])) {
						$destination 	= $set['move'] . '/' . self::getnamefile();
						move_uploaded_file($lokasi_file, $destination);
					}
					$info = 'success';
				} else {
					$info = 'Ukuran file terlalu besar';
				}

			} else {
				$info = 'Type File tidak didukung';
			}
		} else {
			$info = 'Proses unggah gambar mengalami masalah';
		}
		return $info;
	}

	public function validation()
	{
		$validation = self::process_file();
		if ($validation == 'success') {
			return TRUE;
		} else {
			$this->alert = $validation;
			return FALSE;
		}
		
	}

	public function alert()
	{
		return $this->alert;
	}

	public function getnamefile()
	{
		$file 				= $this->set;
		$name 				= $file['post'];
		$nama_file 		= $_FILES[$name]['name'];
		if (isset($file['name']))
			$nama_file 	= $file['name'] . '_' . $nama_file;
		return $nama_file;
	}
}