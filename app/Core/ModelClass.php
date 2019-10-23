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

use app\Core\Database;
use app\Core\Resources\System\Form;
use app\Core\Resources\General\Time;

// -------------------------------------------------------------------------------------------------

class ModelClass
{
	protected $_db, $form;
	private $_table 	= null;
	private $_field 	= null;
	private $_where 	= null;
	private $_session 	= null;

	public function __construct()
	{
		$this->_db 	= Database::getInstance();
		$this->form = new Form();
		$this->time = new Time();

	}

	// -------------------- SETTING -----------------------

	public function setTable($table)
	{
		$this->_table 	= $table;
	}

	public function setSession($session)
	{
		$this->_session = $session;
	}

	// ----------------------------------------------------

	public function getmodel($model=null)
	{
		return Controller::model($model);
	}

	public function filter_input($input){
		$trim 		= trim($input);
		$filter 	= filter_var($trim, FILTER_SANITIZE_STRING);
		$filter 	= addslashes($filter);
		return $filter;
	}

	public function setchart($table,$field,$where=null)
	{
		$this->_table 	= $table;
		$this->_field 	= $field;
		$this->_where 	= $where;
	}

	public function getchart()
	{
		if ($this->_table != null) {
			$label 	= null;
			$jumlah = null;

			$data 	= $this->_db->fetch_part("DISTINCT $this->_field ",$this->_table,$this->_where);
			foreach ($data as $row) {
				$label .= "'" . $row[0] . "',";
				$jum 	= $this->_db->jumdata($this->_table," $this->_field='$row[0]'");
				$jumlah .= $jum . ",";
			}

			return [rtrim($label,','),rtrim($jumlah,',')];
		}else
			die('setchart null');

	}

	public function getjson($url)
	{
		$result 		= file_get_contents($url);
		return json_decode($result);
	}


	// ----------------------------- LOGIN -------------------------------------

	public function proseslog()
	{
		if (isset($_POST['username']) AND isset($_POST['password'])) {
			if ($_POST['username'] != null || $_POST['password'] != null) {
				if ($this->_table == null)
					$this->_db->warning('table tidak terdefinisi','$this->setTable');
				if ($this->_session == null)
					$this->_session = $this->_table;
				$username 	= $_POST['username'];
				$password 	= $_POST['password'];
				$this->_db->table($this->_table);
				$this->_db->where("username = '$username'");
				$data 		= $this->_db->fetch('id');
				if ($data) {
					$cek = false;
					$npassword 	= $data->password;
					if (strlen($npassword) > 45) {
						if (password_verify($password, $npassword))
							$cek = true;
					}else{
						$npassword = md5($password);
						$this->_db->where("password = '$npassword'");
						if ($this->_db->fetch('id'))
							$cek = true;
					}
					if ($cek == true) {
						$id 	= $this->_db->getpri($this->_table);
						if (isset($data->level)) {
							$log 	= $data->level;
							$_SESSION[$log] = $data->$id;
						}else {
							$log 	= true;
							$_SESSION[$this->_session] = $data->$id;
						}
						return $log;
					} else
						return false;
				} else 
					return false;				
			} else
				$this->_db->warning('form username dan password tidak boleh kosong');
		} else {
			$this->_db->warning('name username dan password tidak terdefinisi', 'name=\'username\' / name=\'password\'');
		}
	}

	// ------------------------------AKHIR LOGIN -------------------------------
}