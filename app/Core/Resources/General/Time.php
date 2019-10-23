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

use Datetime;

// this is class for setting time
class Time
{
	function __construct()
	{
		## zona waktu Asia/Jakarta
		date_default_timezone_set('Asia/Jakarta');
	}

	## mengambil tanggal hari ini
	public function setdate() {
		return date('Y-m-d');
	}

	## mengambil Waktu hari ini
	public function settime() {
		return date('H:i:s');
	}

	## mengambil jam hari ini
	public function setHour() {
		return date('H');
	}

	## mengambil tanggal dan waktu hari ini
	public function setdatetime() {
		return date('Y-m-d H:i:s');
	}

	## selesih tanggal dan waktu
	public function setdiff($tgl)
	{
		$tgl 				= new Datetime($tgl);
		$now 				= new Datetime();
		return $tgl->diff($now);
	}

	## menambah jam sesuai dengan keinginan
	public function added_time($time,$add) {
		$data 						= date_create($time);
		date_add($data, date_interval_create_from_date_string("$add hours"));
		return date_format($data, 'H:i:s');		
	}

	## menambah tanggal sesuai dengan keinginan
	public function added_date($tgl,$choose,$add) {
		return date('Y-m-d', strtotime("$add $choose", strtotime($tgl)));
	}

	## mengambil tanggal dalam format indonesia
	public function getdateindo() {
		$hari 		= hari_indo(date('N'));
		$tanggal	= date('d');
		$bulan 		= bulan_indo(date('m'));
		$tahun 		= date('Y');
		return $hari.', '.$tanggal.' '.$bulan.' '.$tahun;
	}

	## mengambil hari ini
	public function getday() {
		return date('d');
	}

	## mengambil bulan ini
	public function getmonth() {
		return date('m');
	}

	## mengambil tahun ini
	public function getyear() {
		return date('Y');
	}

	## mengambil hari ini
	public function getdayindo() {
		return hari_indo(date('N'));
	}

	## mengambil bulan ini
	public function getmonthindo() {
		return bulan_indo(date('m'));
	}

	# merubah id bulan menjadi bulan indo
	public function bulan_indo($m) {
		$bulan 		= [	'01' => 'Januari',
						'02' => 'Februari',
						'03' => 'Maret',
						'04' => 'April',
						'05' => 'Mei',
						'06' => 'Juni',
						'07' => 'Juli',
						'08' => 'Agustus',
						'09' => 'September',
						'10' => 'Oktober',
						'11' => 'November',
						'12' => 'Desember'];

		return $bulan[$m];
	}

	## merubah id hari menjadi hari indo
	public function hari_indo($N) {
		$hari 		= [ '1' => 'Senin',
						'2' => 'Selasa',
						'3' => 'Rabu',
						'4' => 'Kamis',
						'5' => 'Jum\'at',
						'6' => 'Sabtu',
						'7' => 'Minggu'];

		return $hari[$N];
	}

	## merubah format tanggal kedalam format tanggal indo
	public function date_indo($tgl) {
		if ($tgl != '0000-00-00') {
			$divide 	= $this->dividedate($tgl);
			return $divide['date'].' '.$this->bulan_indo($divide['month']).' '.$divide['year'];
		}
	}

	## memisahkan bagian tanggal
	public function dividedate($tgl){
		if ($tgl != '0000-00-00') {
			$d['date']			= substr($tgl, 8,2);
			$d['month']			= substr($tgl, 5,2);
			$d['year']			= substr($tgl, 0,4);
			return $d;
		}
	}

	// mengambil tanggal dari tanggal
	public function getdateofdate($tgl) {
		$divide 	= self::dividedate($tgl);
		return $divide['date'];
	}

	// mengambil bulan dari tanggal
	public function getmonthofdate($tgl) {
		$divide 	= self::dividedate($tgl);
		return $divide['month'];
	}

	// mengambil tahun dari tanggal
	public function getyearofdate($tgl) {
		$divide 	= self::dividedate($tgl);
		return $divide['year'];
	}

	## merubah format tanggal dan waktu kedalam format tanggal waktu indo
	public function datetime_indo($tgl,$br=null) {
		$tanggal		= substr($tgl, 8,2);
		$bulan			= $this->bulan_indo(substr($tgl, 5,2));
		$tahun			= substr($tgl, 0,4);
		$waktu 			= substr($tgl, 11,8);
		if (!empty($br)) {
			$br = '<br>';
		}

		return $tanggal.' '.$bulan." ".$tahun." $br ".$waktu.' WIB';
	}
}