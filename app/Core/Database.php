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

use PDO;

// -------------------------------------------------------------------------------------------------

class Database
{
	private $serv 	= DB_SERV;
	private $host 	= DB_HOST;
	private $user 	= DB_USER;
	private $pass 	= DB_PASS;
	private $db_name= DB_NAME;
	
	private static $_instance = null;
	private $dbh;
	private $stmt;
	private $set 		= null;
	protected $where 	= null;
	private $table	= null; 
	private $opsi 	= null;
	private $part 	= null;
	
	function __construct()
	{
		$dsn = $this->serv .'::host=' . $this->host . ';dbname=' . $this->db_name;

		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	//Fungsi untuk inisiasi class database
	public static function getInstance(){
		if (!isset(self::$_instance)) {
			self::$_instance = new Database();
		}
		return self::$_instance;
	}

	// SETUP ----------------------------------------------------------
	public function bind($param, $value, $type = null)
	{
		if (is_null($type)) {
			switch ( true ) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	public function warning($teks, $info=null)
	{
		if (!is_null($info))
			$info = ' - <i>(' . $info . ')</i>';
		echo "<b>Chatomz Berkata : </b>" . $teks . $info;
		die();
	}

	public function query($query, $set=null)
	{
		$this->stmt = $this->dbh->query($query);
		return $this->resultset($set);
	}

	// ------------------------------------------------------------------

	// SETTER -----------------------------------------------------------

	public function resultset($set=null)
	{
		switch ($set) {
			case 'assoc':
				return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
				break;
			case 'obj':
				return $this->stmt->fetchAll(PDO::FETCH_OBJ);
				break;
			case 'id':
				return $this->stmt->fetch(PDO::FETCH_OBJ);
				break;
			default:
				return $this->stmt->fetchAll(PDO::FETCH_BOTH);
				break;
		}
	}

	public function table($table1, $table2=null)
	{
		if (is_null($table2)) {
			$this->table 	= $table1;
		} else {
			$this->table 	= $table1 . '-' . $table2;
		}
		$this->where 		= null;
		$this->opsi 		= null;
		$this->part 		= null;
	}

	public function part($part)
	{
		$this->part = $part;
	}

	public function Where($where)
	{
		$this->where = " WHERE " . $where;
	}

	public function opsi($opsi)
	{
		$this->opsi = " ".$opsi;
	}

	public function show($sql, $set)
	{
		$this->getResult($sql);
		if($this->stmt->rowCount()>0)
			return $this->resultset($set);
		else
			return FALSE;
	}

	// --------------------------------------------------------------------

	// GETTER -------------------------------------------------------------

	public function getTable()
	{
		if (!is_null($this->table)) {
			return $this->table;
		} else {
			$this->warning('Tabel belum di definisikan! ', '$this->table');
		}
	}

	public function getPart()
	{
		if (is_null($this->part)){
			$part = '*';
			return $part;
		}else
			return $this->part;
	}

	public function getWhere()
	{
		if (!is_null($this->where))
			return $this->where;
	}

	public function getOpsi()
	{
		if (!is_null($this->opsi))
			return $this->opsi;
	}

	public function getResult($sqlselect)
	{
		$sql = $sqlselect;
		$sql .= $this->getWhere();
		$sql .= $this->getOpsi();

		$this->stmt 	= $this->dbh->prepare($sql);
		$this->stmt->execute();
	}

	public function getdesc($tabel)
	{
		return $this->query("desc $tabel");
	}

	public function getPri($tabel)
	{
		$desc 		= $this->getdesc($tabel);
		return $desc[0]['Field'];
	}

	// ----------------------------------------------------------------

	// CRUD -----------------------------------------------------------
	
	// Create
	public function insert($rows)
	{
		if (!is_array($rows)) {
			$this->warning('Parameter insert hanya boleh berisi array 2 dimensi','$d[\'nama_field\'] = isi field');
		}
		try
		{
			$sql 	= "INSERT INTO " . $this->getTable();
			$row 	= null;
			$value 	= null;
			foreach ($rows as $key => $nilai) {
				$row .= $key . ",";
				$value .= ":".$key . ",";
			}
			$sql .= " (".rtrim($row, ",").")";
			$sql .= " VALUES (".rtrim($value, ",").")";

			$this->stmt = $this->dbh->prepare($sql);
			
			foreach ($rows as $key => $nilai) {
				$this->bind(':'.$key,$nilai);
			}
			$this->stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function multi_insert($rows)
	{
		if (!is_array($rows)) {
			$this->warning('Parameter insert hanya boleh berisi array 2 dimensi','$d[\'nama_field\'] = isi field');
		}
		try
		{
			$sql 	= "INSERT INTO " . $this->getTable();
			$row 	= null;
			foreach (end($rows) as $key => $nilai) {
				$row .= $key . ",";
			}
			$sql .= " (".rtrim($row, ",").") VALUES ";
			$i 		= 1;
			foreach ($rows as $row) {
				$value 	= null;
				foreach ($row as $key => $nilai) {
					$value .= ":".$key.$i . ",";
				}
				$i++;
				$sql .= "(".rtrim($value, ",")."),";
			}

			$sql = rtrim($sql,',');


			$this->stmt = $this->dbh->prepare($sql);
			$i = 1;
			foreach ($rows as $row) {
				foreach ($row as $key => $nilai) {
					$this->bind(":".$key.$i, $nilai);
				}
				$i++;
			}
			$this->stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	// Read
	public function fetch($set=null)
	{
		if (preg_match("/-/", $this->getTable())) {
			$this->warning('fungsi fetch hanya diperbolehkan 1 tabel','$this->table(\'tabel-1\')');
		}
		$sql = "SELECT " . $this->getPart() . " FROM " . $this->getTable();
		
		return $this->show($sql, $set);
	}

	// Read
	public function fetchId($id)
	{
		if (preg_match("/-/", $this->getTable())) {
			$this->warning('fungsi fetchId hanya diperbolehkan 1 tabel','$this->table(\'tabel-1\')');
		}
		$field 	= $this->getPri($this->getTable());
		$this->where("$field = '$id'");
		$sql = "SELECT " . $this->getPart() . " FROM " . $this->getTable();
		return $this->show($sql, 'id');
	}

	public function fetchJoin($set=null)
	{
		$tabel 		= explode('-', $this->getTable());
		$field = $this->getPri($tabel[1]);
		$sql = "SELECT " . $this->getPart() . " FROM $tabel[0] INNER JOIN $tabel[1] USING ($field)";
		return $this->show($sql, $set);
	}

	// Update
	public function update($rows,$id)
	{
		if (!is_array($rows)) {
			$this->warning('Parameter update hanya boleh berisi array 2 dimensi','$d[\'nama_field\'] = isi field');
		}

		try
		{
			$field = $this->getPri($this->getTable());
			$sql 	= "UPDATE " . $this->getTable() . " SET ";
			$row 	= null;
			foreach ($rows as $key => $nilai) {
				$row .= $key . "=:" . $key . ",";
			}
			$sql .= rtrim($row, ",") . " WHERE " . $field . "=:id" ;
			$this->stmt = $this->dbh->prepare($sql);
			
			$this->bind(":id",$id);
			foreach ($rows as $key => $nilai) {
				$this->bind(':'.$key,$nilai);
			}
			$this->stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	// Delete
	public function delete($value=null)
	{
		$sql = "DELETE FROM " . $this->getTable();
		if (!is_null($this->where)) {
				$sql .= $this->getWhere();
		} else {
			if (!is_null($value)) {
				$field = $this->getPri($this->getTable());
					$sql .= " WHERE ". $field . "= ?";
			}
		}
		$stmt = $this->dbh->prepare($sql);
		if (!is_null($value)) {
			$stmt->bindparam(1,$value);
		}
		$stmt->execute();
		return true;
	}

	// ----------------------------------------------------------------

	// OTHER ----------------------------------------------------------
	
	// total data
	public function jumdata()
	{
		$sql = "SELECT * FROM " . $this->getTable();
		$this->getresult($sql);
		return $this->stmt->rowCount();
	}

	// get id
	public function lastID()
	{
		$field 	= $this->getPri($this->getTable());
		$sql 	= "SELECT max($field) AS id FROM " . $this->getTable();
		$data 	= $this->show($sql,'id');
		return $data->id;
	}

	function __destruct(){
		$this->dbh = null;
	}
}