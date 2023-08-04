<?php 
	
	$db = new penjualan('localhost','root','','penjualan');
	$db->connectMYSQL();

	$pembelian = $db->bacapembelian($_GET['inv']);
?>
<div class="produk-detail">
	<h1>Proses pembelian berhasil</h1>
	<p>TerimaKasih telah belanja di tempat kami </p>
	<p> silahkan melakukan pembayaran</p>
	<p>INVOICE ANDA <a target="_blank" href="invoice.php?inv=<?=$_GET['inv']?>"><?=$_GET['inv']?></a></p>
</div>