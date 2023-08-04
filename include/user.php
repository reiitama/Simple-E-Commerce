<?php 
	include "database.php";
	class user extends database{
		private $loguser;
		private $logpassword;
		
		//buat method login user
		function setuser($user){
			$this->loguser = $user;
		}
		
		//buat method login password
		function setpassword($password){
			$this->logpassword = $password;
		}
		
		//membuat method bacauser
		function bacauser(){
			return $this->loguser;
		}
		//membuat method bacapassword
		function bacapassword(){
			return $this->logpassword;
		}
		
		// validasi username ada atau tdk
		function validasilogin(){ 
			$query ="SELECT * FROM tbl_user WHERE username='".$this->bacauser()."' AND password='".$this->bacapassword()."'AND level = 'member' ";
			$hasil = mysqli_query($this->dbkonek,$query);
			if(mysqli_num_rows($hasil)> 0){
				return true;
			}else{
				return false;
			}
		}
		
		function proseslogin(){
			$_SESSION['userlogin'] = $this->bacauser();
			$_SESSION['proseslogin']= 1;
		}
		function mengalihkanhalaman($url){
			header("location:".$url);
		}
		//method untuk menyimpan user atau mendaftarkan data user
		function daftaruser($nama,$email,$username,$password,$level){
			$query = "INSERT INTO tbl_user(fullname,email,username,password,level) VALUES('".$nama."','".$email."','".$username."','".$password."','".$level."')";
		//menjalankan perintah query
		$hasil = mysqli_query($this->dbkonek,$query);
		if($hasil){
			echo "Data user telah disimpan";
		}else{
			echo "Data user gagal disimpan";
		}
		}
	}
?>