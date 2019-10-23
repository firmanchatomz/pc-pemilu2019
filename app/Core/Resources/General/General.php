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

namespace app\Core\Resources\General;

// -------------------------------------------------------------------------------------------------

use app\Core\Resources\General\Time;

// this is class for general format
class General
{
	private $time;
	function __construct()
	{
		$this->time = new Time();
	}
	// function of people
	public function getage($tgl,$information=null)
	{
		if ($tgl != '0000-00-00') {
			$different 	= $this->time->setdiff($tgl);
			$age 				= $different->y . ' ' . $information; 
			return $age;
		}	
	}

	public function remaining($tgl=null,$range=6,$info=' ago')
	{
		$remaining 	= $this->time->setdiff($tgl);
		$array 			= array();
		$array 			= get_object_vars($remaining);
		$result 		= null;
		$time 			= ['y','m','d','h','i','s'];
		$information= ['Year','Month','Days','Hours','Minutes','Second'];
		for ($i=0; $i < $range; $i++) {
			$t 	= $time[$i];
			if ($array[$t] != 0) {
				$result 	.= $array[$t] . ' '.$information[$i].' ';
			}
		}
		if ($array[$time[$range-1]] > 0) {
			$result .= $info;
		} else {
			$result .= $array[$time[$range]]. ' '.$information[$range].$info;
		}
		return $result;
	}

	public function hai($value='')
	{
		echo 'haii';
	}
}