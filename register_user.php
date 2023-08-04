<?php 
include "include/user.php";
$db = new user ('localhost', 'root', '', 'penjualan'); 
$db->connectMySQL();
if(isset ($_POST['daftar'])){
	$name = $db->filterinput($_POST['fullname']);
	$email = $db->filterinput($_POST['email']);
	$username = $db->filterinput($_POST['username']);
	$password = $db->filterinput($_POST['password']);
	$level = 'member';
	
	$db->daftaruser($name,$email,$username,$password,$level);
	echo "<script>
		setInterval(function() {
		window.location.href = \"index.php?page=bayar\"
		}, 2000);
		</script>";
}
?>