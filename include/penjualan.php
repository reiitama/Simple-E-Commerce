<?php
include "database.php";

class penjualan extends database{
	//method tampilproduk untuk menampilkan data produk
	function tampilproduk(){
		$query = "SELECT * FROM tbl_produk ORDER BY id DESC";
		$hasil = mysqli_query($this->dbkonek,$query);
		$jnsproduk = array();
		if(mysqli_num_rows($hasil) > 0){	
			while($data = mysqli_fetch_assoc($hasil)){
				// mengisi data array produk
				$produk[] = $data; 
			}
		}
		return $produk;
	}
	//simpanpelanggan
	function simpanpelanggan($id_user,$fullname,$tempat_lahir,$tgl_lahir,$alamat,$nohp,$nowa){
		$tgl_input = date('Y-m-d H:i:s');
		$tgl_edit = date('Y-m-d H:i:s');
		
		$query = "INSERT INTO tbl_pelanggan(id_user,fullname,tmp_lahir,tgl_lahir,alamat,no_hp,no_wa,tgl_input,tgl_edit) VALUES('".$id_user."','".$fullname."','".$tempat_lahir."','".$tgl_lahir."','".$alamat."','".$nohp."','".$nowa."','".$tgl_input."','".$tgl_edit."')";
		
		//menjalankan perintah query
		$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
		}
	}
	//method tampilproduk berdasarkan id
	function tampilprodukbyid($id){
		$query = "SELECT * FROM tbl_produk where id = '$id'";
		$hasil = mysqli_query($this->dbkonek,$query);
		if(mysqli_num_rows($hasil) > 0){	
			$data = mysqli_fetch_assoc($hasil);
			}
		return $data;
		}
	//method simpan pembelian
	function simpanpembelian($invoice,$tgl_pembelian,$pembeli,$produk,$banyak,$total_harga,	$kurir,$ongkos_kirim,$total_bayar,$status){
		$tgl_input = date('Y-m-d H:i:s');
		$tgl_edit = date('Y-m-d H:i:s');
		
		$query = "INSERT INTO tbl_pembelian(invoice,tgl_pembelian,pembeli,produk,banyak,total_harga,kurir,ongkos_kirim,total_bayar,status_pembelian,tgl_input,tgl_edit) VALUES('".$invoice."','".$tgl_pembelian."','".$pembeli."','".$produk."','".$banyak."','".$total_harga."','".$kurir."','".$ongkos_kirim."','".$total_bayar."','".$status."','".$tgl_input."','".$tgl_edit."')";
		
		//menjalankan perintah query
		$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
		}
	}
	//method bacaidpelanggan
	function bacaidpelanggan($user){
		$query = "SELECT id FROM tbl_pelanggan WHERE id_user = '$user'";
		$hasil = mysqli_query($this->dbkonek,$query);
		if(mysqli_num_rows($hasil) > 0){	
			$data = mysqli_fetch_assoc($hasil); 
			}
		return $data['id'];
	}
	//baca id_user
	function bacaiduser($user){
		$query = "SELECT id FROM tbl_user WHERE username = '$user'";
		$hasil = mysqli_query($this->dbkonek,$query);
		if(mysqli_num_rows($hasil) > 0){	
			$data = mysqli_fetch_assoc($hasil); 
			}
		return $data['id'];
	}
	//method cekpelanggan
	function cekpelanggan($user){
		$query = "SELECT * FROM tbl_pelanggan WHERE id_user = '$user'";
		$hasil = mysqli_query($this->dbkonek,$query);
		if(mysqli_num_rows($hasil) > 0){
			return true; 
			}else{
			return false;	
			}
		}
	//method cekpelanggan
	function cekpembelian($tgl){
		$query = "SELECT * FROM tbl_pembelian WHERE SUBSTRING(tgl_pembelian,1,10) = '".substr($tgl,0,10)."'";
		$hasil = mysqli_query($this->dbkonek,$query);
		return mysqli_num_rows($hasil);
		}
		
	//method getinvoice
	function getinvoice($tgl){
		$query = "SELECT invoice FROM tbl_pembelian WHERE SUBSTRING(tgl_pembelian,1,10) = '".substr($tgl,0,10)."' ORDER BY invoice DESC ";
	$hasil = mysqli_query($this->dbkonek,$query);
	if(mysqli_num_rows($hasil) > 0){
		$datas = array();
		while ($data = mysqli_fetch_assoc($hasil)){
			$datas[] = $data['invoice'];
		}
	$invoice = $datas[0];
	$lenght = strlen($invoice);
	$urut = $lenght - 9;
	$nourut = substr($invoice, 9,$urut);
	$nourut_baru = $nourut +1;
	$invoice_baru = "INV".date('dmy').$nourut_baru;
	}
	return $invoice_baru;
	}
	//method bacapembelian
	function bacapembelian($invoice){
		//SELECT sum(ongkos_kirim) as ongkos_kirim, sum(total_bayar) as total_bayar FROM tbl_pembelian WHERE invoice = 'inv2910185'
		// $query = "SELECT * FROM tbl_pembelian WHERE invoice = '$invoice'";
		$query = "SELECT invoice, sum(ongkos_kirim) as ongkos_kirim, sum(total_bayar) as total_bayar FROM tbl_pembelian WHERE invoice = '$invoice'";
		$hasil = mysqli_query($this->dbkonek,$query);
		if(mysqli_num_rows($hasil) > 0){	
			$data = mysqli_fetch_assoc($hasil); 
			}
		return $data;
	}
	function getInvoiceContent($inv){
		$stringquery = "SELECT * FROM tbl_pembelian 
		left join tbl_produk on tbl_pembelian.produk = tbl_produk.id
		where invoice = '$inv'";
		$query = mysqli_query($this->dbkonek, $stringquery);
		$dataInvoice = array();
		while($data = mysqli_fetch_assoc($query)){
			$dataInvoice[] = $data;
		}
		
		return $dataInvoice;
	}
	function invoice($inv){
		$stringquery = "SELECT * FROM tbl_pembelian 
		left join tbl_pelanggan on tbl_pembelian.pembeli = tbl_pelanggan.id
		where invoice = '$inv'";
		$query = mysqli_query($this->dbkonek, $stringquery);
		if(mysqli_num_rows($query) >= 1){
			return mysqli_fetch_assoc($query);
		}
		else return null;	
	}
}
?>