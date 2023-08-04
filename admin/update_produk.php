<?php 
	include "../include/admin.php"; 
	$db = new admin('localhost','root','','penjualan');
	$db->connectMySQL();

	if(isset($_POST['submit'])){
		$id = $db->filterinput($_POST['id']);
		$kode = $db->filterinput($_POST['kode_produk']);
		$nama_produk = $db->filterinput($_POST['nama_produk']);
		$jns_produk = $db->filterinput($_POST['jns_produk']);
		$deskripsi = $db->filterinput($_POST['deskripsi']);
		$harga = $db->filterinput($_POST['harga']);
		$gambar = $kode.".".pathinfo($_FILES['gambar']['name'],PATHINFO_EXTENSION);

		$insert = $db->updateproduk($id,$kode,$nama_produk,$jns_produk,$deskripsi,$harga,$gambar);
		if($insert){
			$db->uploadgambarproduk('../upload',$gambar,$_FILES['gambar']['tmp_name']);
			echo "Data berhasil diperbaharui";
			echo "<script>
			setInterval(function(){
				window.location.href = \"index.php?page=produk\"
			}, 2000);
			</script>";	
		}else{
			echo "Data gagal diperbaharui...<br/><a href=\"?page=produk\">Kembali</a>";
		}
		
	}
?>
