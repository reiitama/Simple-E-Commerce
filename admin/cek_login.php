<?php
session_start();
 
include "database.php";
$db = new user ('localhost', 'root', '', 'penjualan');// class yang dipanggil user 
$db->connectMySQL();
if(isset ($_POST ['submit'])){
	$db->setuser($db->filterinput($_POST['username']));
	$db->setpassword($db->filterinput($_POST['password']));
	if($db->validasilogin()){
		$db->proseslogin();
		$db->mengalihkanhalaman("tampil_buku.php");
	}else{
		echo "login user gagal";
	}
}
?>