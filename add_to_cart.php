<?php	
	session_start(); // syarat menjalankan session 
	include "include/penjualan.php";
	$db = new penjualan('localhost','root','','penjualan');
	$db->connectMYSQL();
	
	$id = $_POST['id']; // id produk
	if(!isset($_SESSION['cart'])){
		$data = array();
	}else{
		$data = $_SESSION['cart'];
	}
	
	$data[$id] = $_POST['banyak'];
	$_SESSION['cart'] = $data;
	
	header('location:http:index.php?page=keranjang_belanja');
?>