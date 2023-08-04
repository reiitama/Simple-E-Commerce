<?php 
	include "../include/admin.php"; 

	$db = new admin('localhost','root','','penjualan');
	$db->connectMySQL();

	if(isset($_GET['i'])){
		$id = $db->filterinput($_GET['i']);
		
		$delete = $db->deleteproduk($id);
		if($delete){
			echo "Data berhasil dihapus";
			echo "<script>
			setInterval(function(){
				window.location.href = \"index.php?page=produk\"
			}, 2000);
			</script>";	
		}else{
			echo "Data gagal dihapus...<br/><a href=\"?page=produk\">Kembali</a>";
		}
	}
?>
