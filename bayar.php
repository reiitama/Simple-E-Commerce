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
<!-- mengecek sudah login belum-->

<?php if(!isset($_SESSION['userlogin'])): ?>
<div class="login">
 <form action="cek_login.php" method="post">
		<label for="username">username</label>
		<input type="text" name="username" id="username">
		<label for="pasword">Password</label>
		<input type="text" name="password" id="password" placeholder="entry password">
		<label for="penerbit">penerbit</label>
		<hr>
		<center>
			<input type="submit" name="submit" id="submit" class="btn" value="login">
		</center>
		<hr>
		<a href="reset_password.php">lupa password</a> | <a href="index.php?page=daftar_akun">daftarkan Akun</a>
	</form>
</div>

<?php else: ?>
<!-- kalau sudah login tampil ke pembelian -->
<div class="pembelian">
<form action="proses_beli.php" method="POST">
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
				<td><?php echo $data['banyak'] ?></td>
				<td><?php echo $total_harga ?></td>
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
	
	<?php $user = $db->bacaiduser($_SESSION['userlogin']); if($db->cekpelanggan($user) == false): ?>
	
	<label>Nama Pembeli</label>
	<input type="text" name="nama_pembeli">
	<label>Tempat Lahir</label>
	<input type="text" name="tmp_lahir">
	<label>Tgl Lahir (format: yyyy-mm-dd,contoh 1989-01-30)</label>
	<input type="text" name="tgl_lahir">
	<label>Alamat</label>
	<textarea name="alamat"></textarea>
	<label>No Hp</label>
	<input type="text" name="nohp">
	<label>No WA</label>
	<input type="text" name="nowa">
	<?php endif; ?>
	<label>kurir</label>
		<select name='kurir'>
			<option value="">-PILIH-</option>
			<option value="REG">JNE - 9000</option>
			<option value="YES">POS - 18000</option>
		</select>
	<input type="hidden" name="username" value="<?php echo $_SESSION['userlogin'] ?>">
	<input type="submit" name="lanjut_bayar" value="lanjut bayar">
</form>
</div>

<?php endif; ?>