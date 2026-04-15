<?php

/**
 * Author     : Alfikri, M.Kom
 * Created By : Alfikri, M.Kom
 * License    : Pemerintahan Provinsi Sumatera Barat
 * Class 	  : global_function_helper.php
 */
defined('BASEPATH') or exit('No direct script access allowed');

/* CI Get Instance */
function CI()
{
	$CI = &get_instance();
	return $CI;
}


function pangkat($x='')
{
	$pangkat = [
		'II/a'=>'Pengatur Muda ',
		'II/b'=>'Pengatur Muda Tk. I ',
		'II/c'=>'Pengatur ',
		'II/d'=>'Pengatur Tk. I',
		'III/a'=>'Penata Muda ',
		'III/b'=>'Penata Muda Tk. 1 ',
		'III/c'=>'Penata ',
		'III/d'=>'Penata Tk. I',
		'IV/a'=>'Pembina ',
		'IV/b'=>'Pembina Tk. I ',
		'IV/c'=>'Pembina Muda ',
		'IV/d'=>'Pembina Madya ',
		'IV/e'=>'Pembina Utama',
		''=>'-',
	];
	if ($x=='') {
		return $pangkat;
	}else{
		return @$pangkat[$x];
	}
}



function enkripsi($string, $action = 'E')
{
	$secret_key = 'my_simple_secret_key';
	$secret_iv = 'my_simple_secret_iv';

	$output = false;
	$encrypt_method = "AES-256-CBC";
	$key = hash('sha256', $secret_key);
	$iv = substr(hash('sha256', $secret_iv), 0, 16);

	if ($action == 'E') {
		$output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
	} else if ($action == 'D') {
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}

	return $output;
}

function bulan_global($x)
{
	$bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	return $bulan[$x];
}


function show_tanggal($tgl){
	$pecah = explode('-', $tgl);
	$show = $pecah[2].' '.nama_bulan($pecah[1]).' '.$pecah[0];
	return $show;
}
function nama_bulan($x)
{
	$bulan = array(
	'01'=>'Januari',
	'02'=> 'Februari',
	'03'=> 'Maret',
	'04'=> 'April',
	'05'=> 'Mei',
	'06'=> 'Juni',
	'07'=> 'Juli',
	'08'=> 'Agustus',
	'09'=> 'September',
	'10'=> 'Oktober',
	'11'=> 'November',
	'12'=> 'Desember');
	return $bulan[$x];
}


function pilihan_bulan()
{
	$bulan = array(
	'01'=>'Januari',
	'02'=> 'Februari',
	'03'=> 'Maret',
	'04'=> 'April',
	'05'=> 'Mei',
	'06'=> 'Juni',
	'07'=> 'Juli',
	'08'=> 'Agustus',
	'09'=> 'September',
	'10'=> 'Oktober',
	'11'=> 'November',
	'12'=> 'Desember');
	return $bulan;
}


function jml_hari_dalam_bulan($bulan, $tahun)
{
	$kalender = CAL_GREGORIAN;
	$jml_hari = cal_days_in_month($kalender, $bulan, $tahun);
	return $jml_hari;
}
function timestamp()
{
	$tgls = date('Y-m-d H:i:s');
	return $tgls;
}

	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
 