<?php
session_start();
$koneksi = new mysqli("localhost","root","","haramainbakery");
?>

<!DOCTYPE html>
<html lang="en">

<body>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>HARAMAIN</span> BAKERY</h1>
									<h2>Menyedikan Aneka Bakery Halal, Sehat dan Lezat</h2>
									<p>Menerima Pesanan </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/foto_4.png" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>HARMAIN</span> BAKERY</h1>
									<h2>Menyedikan Aneka Bakery Halal, Sehat dan Lezat</h2>
									<p>Terbuat dari bahan-bahan terpilih </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/foto_1.png" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>HARAMIN</span> BAKERY</h1>
									<h2>Menyedikan Aneka Bakery Halal, Sehat dan Lezat</h2>
									<p>Roti Hotsis yang paling bestseller. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/foto_7.png" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php $ambil= $koneksi->query("SELECT * FROM produk"); ?>
						<?php while( $perproduk = $ambil->fetch_assoc()){ ?>
						<div class="col-md-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
											<h2>Rp. <?php echo number_format ($perproduk['harga_produk']); ?></h2>
											<p><?php echo $perproduk['nama_produk']; ?></p>
											<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Masukkan keranjang</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rp. <?php echo number_format ($perproduk['harga_produk']); ?></h2>
												<p><?php echo $perproduk['nama_produk']; ?></p>
												<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Masukkan keranjang</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div><!--features_items-->
				
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								<?php $ambil= $koneksi->query("SELECT * FROM produk_recommended"); ?>
								<?php while( $perproduk = $ambil->fetch_assoc()){ ?>	
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="foto_produk_recommended/<?php echo $perproduk['foto_produk_recommended']; ?>" alt="" />
													<h2>Rp. <?php echo number_format ($perproduk['harga_produk_recommended']); ?></h2>
													<p><?php echo $perproduk['nama_produk_recommended']; ?></p>
													<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Masukkan Keranjang</a>
												</div>

											</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
</body>
</html>