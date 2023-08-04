<?php 
	
	$db = new admin('localhost','root','','penjualan');
	$db->connectMySQL();
	$jnsproduk = $db->tampiljenisproduk();
	$kode = $db->bacaproduk('kode_produk',$_GET['i']);
	$nama_produk = $db->bacaproduk('nama_produk',$_GET['i']);
	$jns_produk = $db->bacaproduk('jns_produk',$_GET['i']);
	$deskripsi = $db->bacaproduk('deskripsi',$_GET['i']);
	$harga = $db->bacaproduk('harga',$_GET['i']);

?>
<h1 class="page-title">HAPUS PRODUK</h1>
<nav>
	<a href="?page=produk"> &lt;&lt; Kembali</a>
</nav>
<div id="main-content">
	<h2>Yakin data ini akan dihapus ?</h2>
	<table>
		<tr>
			<td>KODE</td>
			<td>:</td>
			<td><?php echo $kode ?></td>
		</tr>
		<tr>
			<td>NAMA PRODUK</td>
			<td>:</td>
			<td><?php echo $nama_produk ?></td>
		</tr>
		<tr>
			<td>JENIS</td>
			<td>:</td>
			<td><?php echo $db->bacaproduk('jns_produk',$jns_produk) ?></td>
		</tr>
		<tr>
			<td>HARGA</td>
			<td>:</td>
			<td><?php echo $harga ?></td>
		</tr>
	</table>
	<hr/>
	<a href="delete_produk.php?i=<?php echo $_GET['i'] ?>">Ya Hapus</a> | <a href="?page=produk">Tidak</a>
</div>
