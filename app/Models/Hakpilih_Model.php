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

namespace app\Models;

use app\Core\ModelClass;

class Hakpilih extends ModelClass
{
	function __construct()
	{
		parent::__construct(); // get __construct of modelclass
		$this->_db->table('hakpilih');
	}

	// function for add data
	public function createhakpilih($value='')
	{
		$status 			= $_POST['status'];
		$nomor 				= $_POST['nomor'];
		$d['nomor']		= $nomor;
		$d['waktu']		= $this->time->settime();
		$d['status']	= $status;
		$d['jk']			= $_POST['jk'];

		if ($status == 'dpt' || $status == 'dpk') {
			// pengecekan bila ada nomor yang sama
			$this->_db->where("status='$status' AND nomor = '$nomor'");
			$cekduplikat = $this->_db->jumdata();
			if ($cekduplikat > 0) {
				create_alert('Gagal','Data '.strtoupper($status).' tidak ditambahkan karena nomor '.$nomor.' sudah terdaftar');
				return TRUE;
			}
			$d['surat_suara'] = 'full';
		} else {
						// pengecekan bila ada nomor yang sama
			$this->_db->where("status='$status' AND nomor = '$nomor'");
			$cekduplikat = $this->_db->jumdata();
			if ($cekduplikat > 0) {
				create_alert('Gagal','Data '.strtoupper($status).' tidak ditambahkan karena nomor '.$nomor.' sudah terdaftar');
				return TRUE;
			}
			
			$suratsuara 	= $_POST['surat_suara'];
			$value 				= null;
			for ($i=0; $i < count($suratsuara); $i++) { 
					$value .= $suratsuara[$i]. '|';
			}
			$d['surat_suara'] = rtrim($value,'|');
		}
		$this->_db->table('hakpilih');
		$cek = $this->_db->insert($d);
		if ($cek) {
			create_alert('Berhasil','Data '.strtoupper($status).' sudah ditambahkan','success');
		} else {
			create_alert('Gagal','Data '.strtoupper($status).' tidak ditambahkan');
		}

		return TRUE;
		
	}

	public function readhakpilih($value='')
	{
		return $this->_db->fetch();
	}

	// function for read data
	public function readdpt($value='')
	{
		$this->_db->where("status = 'dpt'");
		$this->_db->opsi("order by id_hakpilih ASC");
		return $this->_db->fetch();
	}

		// function for read data
	public function readdptb($value='')
	{
		$this->_db->where("status = 'dptb'");
		return $this->_db->fetch();
	}

		// function for read data
	public function readdpk($value='')
	{
		$this->_db->where("status = 'dpk'");
		return $this->_db->fetch();
	}

	// total
		public function totalhakpilih($value='')
	{
		return $this->_db->jumdata();
	}

	// function for read data
	public function totaldpt($value='')
	{
		$this->_db->where("status = 'dpt'");
		return $this->_db->jumdata();
	}

	public function totaldptL($value='')
	{
		$this->_db->where("status = 'dpt' AND jk = 'L'");
		return $this->_db->jumdata();
	}
		// function for read data
	public function totaldptb($value='')
	{
		$this->_db->where("status = 'dptb'");
		return $this->_db->jumdata();
	}

		// function for read data
	public function totaldptbL($value='')
	{
		$this->_db->where("status = 'dptb' AND jk='L'");
		return $this->_db->jumdata();
	}

		// function for read data
	public function totaldpk($value='')
	{
		$this->_db->where("status = 'dpk'");
		return $this->_db->jumdata();
	}

	public function totaldpkL($value='')
	{
		$this->_db->where("status = 'dpk' AND jk='L'");
		return $this->_db->jumdata();
	}


	// function for count total data
	public function total($value='')
	{
		// kebutuhan data
		$hakpilih 					= self::totalhakpilih();
		$dpt 								= self::totaldpt();
		$dptb 							= self::totaldptb();
		$dpk 								= self::totaldpk();
		$total['hakpilih']	= $hakpilih;
		$total['dpt']				= $dpt;
		$total['dptb']			= $dptb;
		$total['dpk']				= $dpk;
		$total['dpt-l']			= self::totaldptL();
		$total['dpt-p']			= $dpt - self::totaldptL();
		$total['dptb-l']		= self::totaldptbL();
		$total['dptb-p']		= $dptb - self::totaldptbL();
		$total['dpk-l']		= self::totaldpkL();
		$total['dpk-p']		= $dpk - self::totaldpkL();


		// total surat suara
		$total['surat1']	= $hakpilih;
		$total['surat2']	= $dpt + $dpk + jumlahsurat(self::readdptb(), 2);
		$total['surat3']	= $dpt+$dpk+jumlahsurat(self::readdptb(), 3);
		$total['surat4']	= $dpt + $dpk + jumlahsurat(self::readdptb(), 4);
		$total['surat5']	= $dpt + $dpk + jumlahsurat(self::readdptb(), 5);

		return $total;
	}
}