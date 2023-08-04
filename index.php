<?php 
session_start();
include "include/penjualan.php" 
?>
<html>
<head>
<title>APLIKASI PENJUALAN</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<header>
			<h1>Aplikasi Penjualan </h1>
		</header>
		<nav>
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
</body>
</html>