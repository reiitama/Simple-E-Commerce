<?php include "../include/admin.php"?>
<html>
<head>
<title>ADMIN</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header></header>
	<aside>
		<nav>
			<ul id="menu">
				<li class="menu-item">
					<a href="index.php" class="<?php echo !isset($_GET['page']) ? "active" : "" ?>" >Dashboard</a>
				</li>
				<li class="menu-item">
					<a href="?page=produk" class="<?php echo ($_GET['page'] == 'produk') ? "active" : "" ?>">Produk</a>
				</li>
				<li class="menu-item">
					<a href="?page=stock" class="<?php echo ($_GET['page'] == 'stock') ? "active" : "" ?>">Stock</a>
				</li>
			</ul>
		</nav>
	</aside>
	<section>
	<?php
		//METODE UNTUK MEMILIH HALAMAN
		//jika variabel page pada url ada
		if(isset($_GET['page'])){
			$page = $_GET['page']; // $page diisi dari nilai variabel url page
		}else { // jika variabel url page tidak ada
			$page = "dashbord"; //$page isinya adalah dashbord
		}
		// perintah untuk memilih halaman yang akan ditampilkan 
		switch($page){// memilih page
			case 'produk': // nilai var url page adalah produk
				include "produk.php"; //menyisipkan file produk.php
				break;
			case 'tambah_produk':
				include "produk_add.php"; 
				break;
			case 'edit_produk': 
				include "produk_edit.php"; 
				break;
			case 'hapus_produk': 
				include "produk_konfirm_delete.php"; 
				break;
			default:
				include "dashbord.php";
				break;
		}
	?>
	</section>
	<br class="clearfloat"/>
	<footer></footer>
</body>
</html>