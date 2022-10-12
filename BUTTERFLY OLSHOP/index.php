<?php
session_start();
include "admin/koneksi.php";
//koneksi ke database
?>
<!DOCTYPE html>
<html>
<head>
	<title>butterfly olshop</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>


	<?php include 'menu.php'; ?>



<!-- konten -->
<section class="konten">
	<div class="container">
		<h1>Produk Terbaru</h1>

			<div class="row">
					<?php $ambil = $koneksi->query("SELECT * FROM produk "); ?>
					 <?php while ($perproduk = $ambil->fetch_assoc()){ ?> 

						<div class="col-md-3">
							<div class="thumbnail">
								<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
								<div class="caption">
									<h3><?php echo $perproduk['nama_produk']; ?></h3>
									<h5>Rp.<?php echo number_format($perproduk['harga_produk']); ?></h5>
									<a href="beli.php?id_produk=<?php echo $perproduk['id_produk']; ?>" class= "btn btn-primary">Beli</a>
									<a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-default">detail</a>
									</div>
								</div>
							</div>
							<?php } ?>
		
			</div>
					</div>
				</section>
		<script src="admin/assets/js/jquery-1.10.2.js"></script>
		      <!-- BOOTSTRAP SCRIPTS -->
		    <script src="admin/assets/js/bootstrap.min.js"></script>
		    <!-- METISMENU SCRIPTS -->
		 
				</body>
				</html>