<?php
	session_start(); // syarat menjalankan session 
	include "include/penjualan.php";
	$db = new penjualan('localhost','root','','penjualan');
	$db->connectMYSQL();
	
	$user = $db->bacaiduser($_POST['username']);
	if($db->cekpelanggan($user) == false){
	$data = array(
		'fullname'=> $_POST['nama_pembeli'],
		'tmp_lahir'=> $_POST['tmp_lahir'],
		'tgl_lahir'=> $_POST['tgl_lahir'],
		'alamat'=> $_POST['alamat'],
		'nohp'=> $_POST['nohp'],
		'nowa'=> $_POST['nowa'],
		'kurir'=> $_POST['kurir']
	);
	//proses query untuk insert pembelian & data member/pelanggan
	$db->simpanpelanggan($user,$data['fullname'],$data['tmp_lahir'],$data['tgl_lahir'],$data['alamat'],$data['nohp'],$data['nowa']);
	$pembeli = $db->bacaidpelanggan($user);
	}else{
		$pembeli = $db->bacaidpelanggan($user);
	}
	//membuat nomor invoice()
	//komposisi invoice ([INV][dd][mm][yy][nomorurutpembelian])
	$tgl_pembelian = date('Y-m-d H:i:s');
	//menentukan invoice
	if($db->cekpembelian($tgl_pembelian) > 0){
		$invoice = $db->getInvoice($tgl_pembelian);
	}else{
		$invoice = "INV".date('dmy')."1";
	}
	//mementukan ongkir
	if($_POST['kurir'] == 'REG'){
		$ongkir = 9000;	
	}elseif($_POST['kurir'] == 'YES'){
		$ongkir = 18000;
	}
	//ambil listdata produk
	if(isset($_SESSION['cart']) && $_SESSION['cart'] != null){foreach($_SESSION['cart'] as $key=>$value){
		$produk = $db->tampilprodukbyid($key);
		$cart[] =array(
		 'produk' => $produk,
		 'banyak' => $value
		);
		}
	}
	
	 $total=0; 
	 foreach($cart as $key => $val){
		$total_harga =$val['produk']['harga'] * $val['banyak'];
		$total += $total_harga;
		$total_bayar=$total + $ongkir;
		$status=1;		
		$db->simpanpembelian($invoice,$tgl_pembelian,$pembeli,$val['produk']['id'],$val['banyak'],$total_harga,$_POST['kurir'],$ongkir,$total_bayar,$status);		
	 }
	//untuk menghapus data di session
	unset($_SESSION['cart']);
	// mengalihkan ke halaman keranjang belanja
	header('location:http:index.php?page=tagihan_pembelian&inv='.$invoice);

?>