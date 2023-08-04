<?php 
session_start();
include "include/penjualan.php" 
?>
<html>
<head>
<title>APLIKASI PENJUALAN</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<header>
			<h1>Aplikasi Penjualan </h1>
		</header>
		<nav class="navbar navbar-dark bg-dark">
			<ul class="menu">
				<li class="menu-item">
					<a href="index.php" class="<?php echo !isset($_GET['page'])? "active":"" ?>">Home</a>
				</li>
				<li class="menu-item">
					<a href="?page=produk" class="<?php echo !isset($_GET['page'])? "active":"" ?>">Produk</a>
				</li>
				<li class="menu-item">
					<a href="?page=logout" class="<?php echo !isset($_GET['page'])? "active":"" ?>">Log Out</a>
				</li>
			</ul>	
		</nav>
		<section>
			<?php
				
				if(isset($_GET['page'])){
					$page = $_GET['page']; 
				}else { 
					$page = "home"; 
				}
				switch($page){
					case 'home': 
						include "home.php"; 
						break;
					case 'produk': 
						include "produk.php"; 
						break;
					case 'produk_detail': 
						include "produk_detail.php";
						break;
					case 'bayar': 
						include "bayar.php";
						break;
					case 'daftar_akun': 
						include "register_akun.php";
						break;
					case 'keranjang_belanja': 
						include "keranjang_belanja.php"; 
						break;
					case 'tagihan_pembelian': 
						include "tagihan.php"; 
						break;
					case 'logout':
						include "logout.php";
						break;
			}
	?>
		</section>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>