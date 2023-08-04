<?php 
	$db = new penjualan('localhost','root','','penjualan');
	$db->connectMYSQL();
	$produk = $db->tampilprodukbyid($_GET['i']);
?>
<div class="produk-detail">
	<div class="produk-image" style="<?php echo $produk['gambar'] != "" && file_exists("./upload/".$produk['gambar']) ? "background-image:url(upload/".$produk['gambar'].")" : "background-image:url(upload/index.jpg)" ?>"></div>
	<div class="produk-desc">
	<h2 class ="produk-name"><?php echo $produk['kode_produk']." - " .$produk['nama_produk'] ?></h2>
	<p class = "deskripsi">
		<?php echo "<b>deskripsi: </b><br/>".$produk['deskripsi'] ?>
	</p>
	<hr/>
	<div class="produk-nav">
		<div class="produk-harga"><?php echo "harga: Rp. ".$produk['harga'] ?>
		</div>
		<form action="add_to_cart.php" name="add_to_cart_form" method="post" class="inline-form">
			<input type="hidden" name="id" value="<?php echo $produk['id'] ?>">
			<input type ="text" class= "form-control" name="banyak" value="1" size="2"/>
			<input type="submit" name="add_to_cart" class="btn" value="add to cart">
		</form>
		</div>
	</div>
</div>
	
<div class="ulasan-produk">
</div>