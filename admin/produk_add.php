<h1 class="page-title">Tambah Produk</h1>
<?php
	$db = new admin('localhost','root','','penjualan');
	$db->connectMySQL();
	$jnsproduk= $db->tampiljenisproduk();
?>
<nav>
 <a href="?page=produk">&lt;&lt; Kembali</a>
 
</nav>
<div id= "main-content">
<form class="input-form" action="produk_insert.php" method="POST" enctype="multipart/form-data">
	<label class="fprm-label">Kode</label>
	<input type="text" name="kode_produk" class="form-control" />
	<label class="fprm-label">Nama produk</label>
	<input type="text" name="nama_produk" class="form-control" />
	<label class="fprm-label">Jenis</label>
	<select class="form-control" name="jns_produk">
		<option value="">Pilih</option>
			<?php foreach($jnsproduk as $key => $value): ?>
		<option value="<?php echo $value['id'] ?>"><?php echo $value['jns_produk']?></option>
		<?php endforeach; ?>
	</select>
	<label class="form-label">Deskripsi</label>
	<textarea name="deskripsi" class="form-control"></textarea>
	<label class="form-label">Harga satuan</label>
	<input type="text" name="harga" class="form-control text-right" />
	<label class="form-label">Upload Gambar disini</label>
	<input type="file" name="gambar" />
	<hr />
	<input type="submit" name="submit" value="simpan" class="btn" />&nbsp;
	<input type="reset" name="reset" value="batal" class="btn" />
</form>
</div>