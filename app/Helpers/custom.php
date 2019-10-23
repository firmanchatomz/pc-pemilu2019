<?php
// helper costum

// count total information of notif
function jumlahsurat($data, $nomorsurat)
{
	$jumlah = 0;
	if (isset($data)  AND !empty($data)) {
		foreach ($data as $row) {
			$surat_suara = $row['surat_suara'];

			if (preg_match("/$nomorsurat/", $surat_suara)) {
				$jumlah = $jumlah + 1;
			}
		}
	}
	return $jumlah;
}

// data pemilih

function totalpemilih()
{
	$total = pemilih('dpt')['total'] + pemilih('dptb')['total'] + pemilih('dpk')['total'];

	return $total;
}

function sisasurat($total,$digunakan,$rusak)
{
	$sisa = $total - $digunakan - $rusak;
	return $sisa;
}

function sisapemilih($total,$pengguna)
{
	$sisa = $total - $pengguna;
	return $sisa;
}