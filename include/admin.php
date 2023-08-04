<?php

include "database.php";

class admin extends database{
//untuk tbl_produk
	// method tambah produk untuk menambah produk
	function tambahproduk($kode_produk,$nama_produk,$jenis_produk,$deskripsi,$harga,$gambar){
		
		$tgl_input = date('Y-m-d H:i:s');
		$tgl_edit = date('Y-m-d H:i:s');
		
		$query = "INSERT INTO tbl_produk(kode_produk,nama_produk,jns_produk,deskripsi,harga,gambar,tgl_input,tgl_edit) VALUES('".$kode_produk."','".$nama_produk."','".$jenis_produk."','".$deskripsi."','".$harga."','".$gambar."','".$tgl_input."','".$tgl_edit."')";
		
		//menjalankan perintah query
		$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
		}
	}

	// method tampilBuku untuk menambilkan data buku 4
	function tampilproduk(){
		
		$query = "SELECT * FROM tbl_produk ORDER BY id DESC";
		$hasil = mysqli_query($this->dbkonek,$query);
		$produk = array();
		if(mysqli_num_rows($hasil) > 0){	
			while($data = mysqli_fetch_assoc($hasil)){
				$produk[] = $data; 
				// mengisi data array produk
			}

		}
		return $produk;
	}
	// methot jenis_produk
	function tampiljenisproduk(){
		
		$query = "SELECT * FROM tbl_jenis_produk ORDER BY id DESC";
		$hasil = mysqli_query($this->dbkonek,$query);
		$jnsproduk = array();
		if(mysqli_num_rows($hasil) > 0){	
			while($data = mysqli_fetch_assoc($hasil)){
				$jnsproduk[] = $data; 
				// mengisi data array produk
			}

		}
		return $jnsproduk;
	}

	// Method updateproduk
	function updateproduk($id,$kode_produk,$nama_produk,$jns_produk,$deskripsi,$harga,$gambar){
		
		$tgl_edit = date('Y-m-d H:i:s');// mencatat terakhir diedit
		
	 	$query = "UPDATE tbl_produk set kode_produk = '".$kode_produk."', nama_produk = '".$nama_produk."',jns_produk = '".$jns_produk."', deskripsi = '".$deskripsi."', harga = '".$harga."',gambar='".$gambar."', tgl_edit = '".$tgl_edit."' where id = '".$id."'";
	//menjalankan perintah query
	 	$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
	 	}
	 }
	 
	 function updategambarproduk($id,$gambarlama,$gambarbaru){
		 
		 //file_exist untuk cek keberadaan file
		 if(file_exists($lokasi."/".$gambarlama)){
			unlink($gambarlama); //untuk menghapus file gambar
		 }
		 
		 $upload = move_uploaded_file($gambarbaru, $location."/".$gambarbaru);
		 if($upload){
		$tgl_edit = date('Y-m-d H:i:s');// mencatat terakhir diedit
	 	$query = "UPDATE tbl_produk set gambar = '".$gambar."' where id = '".$id."'";
	//menjalankan perintah query
	 	$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
	 	}
		}
		 
	 }
	 
	// buat method edit 6
	function bacaproduk($type,$id){
		$query ="SELECT $type FROM tbl_produk where id ='$id'";
		//$type untuk nama filed(colom) $id kunci di id
		$hasil = mysqli_query($this->dbkonek,$query);//menjalankan perintah query dbkonek untuk koneksi
		$data = mysqli_fetch_assoc($hasil);//membaca hasil query yang tuangkan dalam array
		return $data[$type];// dikembalikan ke type(filed) data
	}
	 
	// Method deleteproduk

	function deleteproduk($id){
	 	$query = "DELETE from tbl_produk where id = '".$id."'";
	//menjalankan perintah query
	 	$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
	 	}
	 }
	 
	 function deletegambarproduk($lokasi,$gambar,$src){
	 	if(file_exist($lokasi."/".$gambar)){
			unlink($lokasi."/".$gambar);
		}
	 }
	 //upload gambar
	function uploadgambarproduk($lokasi,$gambar,$src){
	 	if(!file_exists($lokasi."/".$gambar)){
			move_uploaded_file($src,$lokasi."/".$gambar);
		}
	 }
//buat tbl_stok buat method tambah stok, update stok, delete stok, tampil stok, baca data stock
	 
	 // method tambah stok 
	 function stok($produk,$stok){
		
		$tgl_input = date('Y-m-d H:i:s');
		$tgl_edit = date('Y-m-d H:i:s');
		$query = "INSERT INTO tbl_stok(produk,stok) VALUES('".$produk."','".$stok."')";
		$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
		}
	}
	//method update stok
	function updatestok($id,$poduk,$stok){
		
		$tgl_edit = date('Y-m-d H:i:s');
		
	 	$query = "UPDATE tbl_stok set produk = '".$produk."', stok = '".$stok."', tgl_edit = '".$tgl_edit."' where id = '".$id."'";
	 	$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
	 	}
	 }
	//delete stok
	function delete_stock($id){
	 	$query = "DELETE from tbl_stok where id = '".$id."'";
	 	$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
	 	}
	 }
	 
	//tampil stok
	 function tampilstok(){
		$query = "SELECT * FROM tbl_stok ORDER BY id DESC";
		$hasil = mysqli_query($this->dbkonek,$query);
		if(mysqli_num_rows($hasil) > 0){
			$stok = array();
			while($data = mysqli_fetch_assoc($hasil)){
				$stok[] = $data; 
			}

		}
	//baca data stok
	function bacastok($type,$id){
		$query ="SELECT $type FROM tbl_stok where id ='$id'";
		$hasil = mysqli_query($this->dbkonek,$query);
		$data = mysqli_fetch_assoc($hasil);
		return $data[$type];
	}
	// method tampil pembelian (tbl_pembelian)
	function tampilpembelian(){
		
		$query = "SELECT * FROM tbl_pembelian ORDER BY id DESC";
		$hasil = mysqli_query($this->dbkonek,$query);
		if(mysqli_num_rows($hasil) > 0){
			$pembelian = array();
			while($data = mysqli_fetch_assoc($hasil)){
				$pembelian[] = $data; 
				// mengisi data array produk
			}
		}
		return $pembelian;
	}
	
	// method update pembelian (tbl_pembelian)
	function updatepembelian($id,$status_pembelian){
		
		$tgl_edit = date('Y-m-d H:i:s');
		
	 	$query = "UPDATE tbl_pembelian set status_pembelian = '".$status_pembelian."', where id = '".$id."'";
	 	$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
	 	}
	 }
	 
	//method tampil pembayaran
	function tampilpembayaran(){
		$query = "SELECT * FROM tbl_pembayaran ORDER BY id DESC";
		$hasil = mysqli_query($this->dbkonek,$query);
		if(mysqli_num_rows($hasil) > 0){
			$pembayaran = array();
			while($data = mysqli_fetch_assoc($hasil)){
				$pembayaran[] = $data; 
			}
		}
		return $pembayaran;
	}
	//method update bembayaran
	function updatepembayaran($id,$status_pembayaran){
		
		$tgl_edit = date('Y-m-d H:i:s');
		
	 	$query = "UPDATE tbl_pembelian set status_pembayaran = '".$status_pembayaran."', where id = '".$id."'";
	 	$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
	 	}
	 }
	//method tambah pengirim
	function pengiriman($tgl_kirim,$kurir,$no_resi,$alamat_tujuan,$alamat_pengirim,$pembeli){
		
		$tgl_input = date('Y-m-d H:i:s');
		$tgl_edit = date('Y-m-d H:i:s');
		
		$query = "INSERT INTO tbl_pengirim(tgl_kirim,kurir,no_resi,alamat_tujuan,alamat_pengirim,pembeli,tgl_input,tgl_edit) VALUES('".$tgl_kirim."','".$kurir."','".$no_resi."','".$alamat_tujuan."','".$alamat_pengirim."','".$pembeli."')";
		$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
		}
	}
	//method update pengiriman
	function updatepengiriman($id,$tgl_kirim,$kurir,$no_resi,$alamat_tujuan,$alamat_pengirim,$pembeli){
		
		$tgl_edit = date('Y-m-d H:i:s');// mencatat terakhir diedit
		
	 	$query = "UPDATE tbl_pengiriman set tgl_kirim = '".$tgl_kirim."', kurir = '".$kurir."',no_resi = '".$no_resi."', alamat_tujuan = '".$alamat_tujuan."', alamat_pengirim = '".$alamat_pengirim."',pembeli = '".$pembeli."', tgl_edit = '".$tgl_edit."' where id = '".$id."'";
	 	$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			return true;
		}else{
			return false;
	 	}
	 }
} 
}
?>