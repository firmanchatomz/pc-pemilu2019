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

class Pemilih extends ModelClass
{
	function __construct()
	{
		parent::__construct(); // get __construct of modelclass
		$this->_db->table('pemilih');
	}

	// function for add data
	public function create($value='')
	{
		# set code here
	}

	// function for update data
	public function updatepemilih($value='')
	{
		for ($i=0; $i < count($_POST['id_pemilih']); $i++) {
			$id_pemilih 		= $_POST['id_pemilih'][$i]; 
			$jump 					= $_POST['jumlah_l'][$i];
			$juml 					= $_POST['jumlah_p'][$i];
			$d['jumlah_l'] 	= $jump;
			$d['jumlah_p'] 	= $juml;
			$d['keterangan']= $_POST['keterangan'][$i];

			$d['total']			= $jump + $juml;

			$this->_db->update($d,$id_pemilih);
		}
		return TRUE;
	}

	// function for delete data
	public function delete($value='')
	{
		# set code here
	}

	// function for read data
	public function readpemilih($value='')
	{
		return $this->_db->fetch();
	}

	// function for count total data
	public function totalpemilih($value='')
	{
		$this->_db->part("sum(total) as jumlah");
		$data = $this->_db->fetch();
		return $data[0]['jumlah'];
	}
}