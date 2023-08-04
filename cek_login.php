<?php  
session_start();
 
include "include/user.php";
$db = new user ('localhost', 'root', '', 'penjualan');// class yang dipanggil user 
$db->connectMySQL();
if(isset ($_POST ['submit'])){
	$db->setuser($db->filterinput($_POST['username']));
	$db->setpassword($db->filterinput($_POST['password']));
	if($db->validasilogin()){
		$db->proseslogin();
		$db->mengalihkanhalaman("index.php?page=bayar");
	}else{
		echo "login user gagal";
	}
}
?>