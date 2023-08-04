<?php 
	$db = new penjualan('localhost','root','','penjualan');
	$db->connectMYSQL();

	if(isset($_SESSION['cart']) && $_SESSION['cart'] != null){foreach($_SESSION['cart'] as $key=>$value){
		$produk = $db->tampilprodukbyid($key);
		$cart[] =array(
		 'produk' => $produk,
		 'banyak' => $value
		);
		}
	}	
?>
<div class="produk-detail">
	<table class="cart-table" border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Produk</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Banyak</th>
				<th>Total Harga</th>
			</tr>
		</thead>
		<tbody>
		<?php $no = 1; $total=0; foreach($cart as $key => $data): ?>
		<?php 
		$total_harga =$data['produk']['harga'] * $data['banyak'];
		$total += $total_harga;
		?>		
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $data['produk']['kode_produk'] ?></td>
				<td><?php echo $data['produk']['nama_produk'] ?></td>
				<td><?php echo $data['produk']['harga'] ?></td>
				<td><input type="text" name="banyak[]" value="<?php echo $data['banyak'] ?>"/></td>
				<td> <?php echo $total_harga ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5"> total bayar</td>
				<td><?php echo $total ?></td>
			</tr>
		</tfoot>
	</table>
	<div class="nav-cart">
		<a href="index.php?page=produk">Kembali Belanja</a>
		<a href="index.php?page=bayar">checkout</a>
	</div>
</div>