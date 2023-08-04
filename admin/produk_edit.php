<?php 
	
	$db = new admin('localhost','root','','penjualan');
	$db->connectMySQL();
	$jnsProduk = $db->tampiljenisproduk();
	$kode = $db->bacaproduk('kode_produk',$_GET['i']);
	$nama_produk = $db->bacaproduk('nama_produk',$_GET['i']);
	$jns_produk = $db->bacaproduk('jns_produk',$_GET['i']);
	$deskripsi = $db->bacaproduk('deskripsi',$_GET['i']);
	$harga = $db->bacaproduk('harga',$_GET['i']);

?>
<h1 class="page-title">TAMBAH PRODUK</h1>
<nav>
	<a href="?page=produk"> &lt;&lt; Kembali</a>
</nav>
<div id="main-content">
	<form class="input-form" action="update_produk.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $_GET ['i'] ?>" />
		<label class="form-label">KODE</label>
		<input type="text" name="kode_produk" class="form-control" value="<?php echo $kode ?>" />
		<label class="form-label">NAMA PRODUK</label>
		<input type="text" name="nama_produk" class="form-control" value="<?php echo $nama_produk ?>" />
		<label class="form-label">JENIS</label>
		<select class="form-control" name="jns_produk">
			<option value="">-Pilih-</option>
			<?php foreach($jnsProduk as $key => $value): ?>
			<option value="<?php echo $value['id'] ?>" <?php echo $jns_produk == $value['id'] ? "selected" : "" ?> ><?php echo $value['jns_produk'] ?></option>
			<?php endforeach; ?>
		</select>
		<label class="form-label">DESKRIPSI</label>
		<textarea name="deskripsi" class="form-control"><?php echo $deskripsi ?></textarea>
		<label class="form-label">HARGA SATUAN</label>
		<input type="text" name="harga" class="form-control text-right" value="<?php echo $harga ?>" />
		<label class="form-label">Upload gambar disini</label>
		<input type="file" name="gambar" />
		<hr />
		<input type="submit" name="submit" value="SIMPAN" class="btn" />&nbsp;
		<input type="reset" name="reset" value="BATAL" class="btn" />
	</form>
</div>
