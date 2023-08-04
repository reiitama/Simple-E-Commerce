<?php
include "../include/admin.php";
$db = new admin('localhost', 'root', '', 'penjualan');
$db->connectMySQL();
if(isset ($_POST['submit'])){
	$kode = $db->filterinput($_POST['kode_produk']);
	$nama_produk = $db->filterinput($_POST['nama_produk']);
	$jns_produk = $db->filterinput($_POST['jns_produk']);
	$deskripsi = $db->filterinput($_POST['deskripsi']);
	$harga = $db->filterinput($_POST['harga']);
	$gambar = $kode.".".pathinfo($_FILES['gambar']['name'],PATHINFO_EXTENSION);
	$insert = $db->tambahproduk($kode,$nama_produk,$jns_produk,$deskripsi, $harga, $gambar);
	if($insert){
		$db->uploadgambarproduk('../upload',$kode,$_FILES['gambar']['tmp_name']);
	echo "data berhasil disimpan";
	echo "<script>
		setInterval(function() {
			window.location.href = \"index.php?page=produk\"
		}, 2000);
		</script>";
	}else{
		echo "Data gagal disimpan.....<br/><a href=\"?page=produk\">kembali</a>";
	}	
}
?>