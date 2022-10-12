
<?php
session_start();
$koneksi = new mysqli("localhost","root","","haramainbakery");
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))

{
	echo "<script>alert('Keranjang kosong, silahkan belanja dulu');</script>";
	echo "<script>location='index.php?halaman=home';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php?halaman=home">Home</a></li>
				  <li class="active">Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Gambar</td>
							<td class="description">Nama Produk</td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Total</td>
							<td class="delete">Aksi</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php $totalbelanja = 0; ?>
					<?php $totalbayar = 0; ?>
					<?php foreach ($_SESSION["keranjang"] as $id_produk=> $jumlah): ?>
					<?php
						$ambil = $koneksi->query("SELECT * FROM produk
						WHERE id_produk='$id_produk'");
						$pecah = $ambil -> fetch_assoc();
						$subharga = $pecah["harga_produk"]*$jumlah;
						$totalbayar = $subharga*$jumlah;
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="foto_produk/<?php echo $pecah['foto_produk']; ?>" width="150px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $pecah['nama_produk']; ?></a></h4>
							</td>
							<td class="cart_price">
								<h4><?php echo number_format ($pecah['harga_produk']); ?></h4>
							</td>
							<td class="cart_quantity">
								<h4><?php echo $jumlah; ?></h4>
							</td>
							<td class="cart_total">
								<h4><?php echo number_format ($subharga); ?></h4>
							</td>
							<td class="cart_delete">
								<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					<?php $totalbayar+=$totalbelanja; ?>
					<?php $totalbelanja+=$subharga; ?>
					<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Subtotal Keranjang <span><?php echo number_format ($totalbelanja); ?></span></li>
						</ul>
							<a class="btn btn-default update" href="index.php?halaman=home">Lanjutkan Belanja</a>
							<a class="btn btn-default check_out" href="index.php?halaman=checkout">Check Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</section><!--/#do_action-->
</body>
</html>