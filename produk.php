<?php 
	$db = new penjualan('localhost','root','','penjualan');
	$db->connectMYSQL();
	$produk = $db->tampilproduk();
?>
<?php foreach($produk as $key=>$value): ?>
<div class="box">
	<div class="produk-image" style="<?php echo $value['gambar'] != "" && file_exists("./upload/".$value['gambar']) ? "background-image:url(upload/".$value['gambar'].")" : "background-image:url(upload/no_image.png)" ?>"></div>
	<div class="produk-desc">
		<h2 class="produk-name"><a href="?page=produk_detail&i=<?php echo $value['id'] ?>"><?php echo $value['kode_produk']." - ".$value['nama_produk'] ?></a></h2>
		<p class="produk-harga"><?php echo $value['harga'] ?> </p>
	</div>
	<div class="produk-nav">
		<a class="btn" href="?page=produk_detail&i=<?php echo $value['id'] ?>">Beli</a>
	</div>
</div>
<?php endforeach; ?>
