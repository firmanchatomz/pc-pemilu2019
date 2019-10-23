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

namespace app\Models\Resources;

// -------------------------------------------------------------------------------------------------

use App\Core\Database;

class Db
{
	public function db()
	{
		return Database::getInstance();
	}

// ################################################################################################
// READ STATIC FUNCTION 

	// read for one data of table in database
	public function read($table,$id)
	{
		$db = self::db();
		$db->table($table);
		return $db->fetchid($id);
	}

	// read for all data of table in database
	public function readAll($table,$opsi=null)
	{
		$db = self::db();
		$db->table($table);
		$result = $db->fetch('obj');
		if (is_bool($opsi)) {
			if ($opsi) {
				rsort($result);
			}
		}
		return $result;
	}

	// read for part field data of table in database
	public function readpart($part,$table,$opsi=null)
	{
		$db = self::db();
		$db->table($table);
		$db->part($part);
		$result = $db->fetch('obj');
		if (is_bool($opsi)) {
			if ($opsi) {
				rsort($result);
			}
		}
		return $result;
	}

	// read for two table foreign key dan primary key (relation table)
	public function readjoin($table, $table2)
	{
		$db = self::db();
		$db->table($table,$table2);
		return $db->fetchjoin('obj');
	}

	// read last id data of table in database
	public function readlast($table)
	{
		$id = self::lastID($table);
		return self::read($table, $id);
	}

	// END FUNCTION
// ################################################################################################


// ################################################################################################
// DELETE STATIC FUNCTION

	// delete for one data of table in database
	public function delete($table, $id)
	{
		$db = self::db();
		$db->table($table);
		return $db->delete($id);
	}

	// delete for all data of table in database
	public function deleteAll($table)
	{
		$db = self::db();
		$db->table($table);
		return $db->delete();
	}
	// END FUNCTION
// ################################################################################################


// ################################################################################################
// TOTAL STATIC FUNCTION

	// total data of table in database
	public function total($table,$where=null)
	{
		$db = self::db();
		$db->table($table);
		if (!is_null($where)) {
			$db->where($where);
		}
		return $db->jumdata();
	}
		// END FUNCTION
// ################################################################################################


// ################################################################################################
// GET ID  

	// get last id data of table in database 
	public function lastID($table)
	{
		$db = self::db();
		$db->table($table);
		return $db->lastId();
	}
}