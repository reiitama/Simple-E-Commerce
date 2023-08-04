<?php
	$db = new admin('localhost','root','','penjualan');
	$db->connectMySQL();
	$produk= $db->tampilproduk();
	// echo "<pre>" ; print_r($produk); echo "</pre>";
 ?>
<h1 class="page-title">Produk</h1>
<nav>
 <a href="?page=tambah_produk">Tambah Produk</a>
</nav>
<div id= "main-content">
	<table border=1 width=100%>
	<thead>
		<tr>
			<th> NO </th>
			<th> Kode </th>
			<th> Nama Produk </th>
			<th> Jenis </th>
			<th> Harga </th>
			<th> Gambar </th>
			<th> # </th>
		</tr>
	</thead>
	<tbody>
	<!-- jika produk ada -->
		<?php if(count($produk)>=1): ?>
		<!-- tampil produk -->
			<?php $no = 1; foreach($produk as $key => $value): ?>
				<tr>
					<td><?php echo $no ?></td>
					<td><?php echo $value['kode_produk']?></td>
					<td><?php echo $value['nama_produk']?></td>
					<td><?php echo $value['jns_produk']?></td>
					<td><?php echo $value['harga']?></td>
					<td><?php echo $value['gambar']?></td>
					<td><a href="<?php echo "?page=edit_produk&i=".$value['id'] ?>">Edit</a> | <a href="<?php echo "?page=hapus_produk&i=".$value['id'] ?>">Hapus</a> </td>
				</tr>
				<?php $no++; endforeach; ?>
		<?php else: ?> <!--jika tidak ada-->
		<?php endif; ?>
	</tbody>
	</table>
</div>