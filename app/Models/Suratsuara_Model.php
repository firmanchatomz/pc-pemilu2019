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

class Suratsuara extends ModelClass
{
	function __construct()
	{
		parent::__construct(); // get __construct of modelclass
		$this->_db->table('suratsuara');
	}

	// function for add data
	public function create($value='')
	{
		# set code here
	}

	// function for update data
	public function updatesuratsuara($value='')
	{
		for ($i=0; $i < count($_POST['id_suratsuara']); $i++) { 
			$id_suratsuara 	= $_POST['id_suratsuara'][$i];
			$d['total'] 		= $_POST['total'][$i];
			$d['rusak'] 		= $_POST['rusak'][$i];

			$this->_db->update($d,$id_suratsuara);
		}
	}

	// function for delete data
	public function delete($value='')
	{
		# set code here
	}

	// function for read data
	public function readsuratsuara($value='')
	{
		return $this->_db->fetch();
	}

	// function for count total data
	public function total($value='')
	{
		# set code here
	}
}