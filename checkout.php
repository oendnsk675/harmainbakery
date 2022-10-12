<?php
session_start();
$koneksi = new mysqli("localhost","root","","haramainbakery");

if (!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('Silahkan login');</script>";
	echo "<script>location='index.php?halaman=login';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
	<section id="cart_items">
		<div class="container" style="padding-bottom: 15em;">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php?halaman=cart">Cart</a></li>
				  <li class="active">Checkout</li>
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
							<td class="kurir">kurir</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
					<?php $totalbelanja = 0; ?>
					<?php foreach ($_SESSION["keranjang"] as $id_produk=> $jumlah): ?>
					<?php
						$ambil = $koneksi->query("SELECT * FROM produk
						WHERE id_produk='$id_produk'");
						$pecah = $ambil ->fetch_assoc();
						$subharga = $pecah["harga_produk"]*$jumlah;
						?>
						<tr>
							<input type="hidden" value="<?= count($_SESSION["keranjang"]) ?>" id="count_cart">
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
							<td class="kurir">
								<h4>Rp0</h4>
							</td>
							<td class="cart_total">
								<h4 data-subharga="<?php echo $subharga ?>" class="subharga">Rp<?php echo number_format ($subharga); ?></h4>
							</td>
						</tr>
					<?php $totalbelanja+=$subharga; ?>
					<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="5" style="padding-left: 39px;"><h4>Total Harga</h4></th>
							<input type="hidden" id="data-total-belanja" value="<?= $totalbelanja ?>">
							<th><h4 id="total-belanja">Rp. <?php echo number_format ($totalbelanja); ?></h4></th>
						</tr>
					</tfoot>
				</table>
			</div>
			<form method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>"
							class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>"
							class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="alamat lengkap" required></textarea>
					</div>
					<div class="col-md-4">
						<select class="form-control" name="id_kurir" id="id_kurir" required="required">
									<option value="" data-kurir="0">Pilih Kurir</option> 
									<?php
									$ambil = $koneksi->query("SELECT * FROM kurir");
									while($perkurir=$ambil->fetch_assoc()) {
									?>
									<option data-kurir="<?= $perkurir['tarif'] ?>" value="<?php echo $perkurir["id_kurir"] ?>">
										<?php echo $perkurir ["nama_kurir"] ?>
									</option>
									<?php } ?>
						</select>
						<!-- <select name="sad" id="sad" required>
							<option value="">sad</option>
						</select> -->
					</div>
				</div>
				<button class="btn btn-warning" style="margin-top: 1em;" name="checkout">Checkout</button>
				</form>
				<?php
				if (isset($_POST['checkout']))
				{
					$id_pelanggan = $_SESSION ["pelanggan"]["id_pelanggan"];
					$id_kurir = $_POST ["id_kurir"];
					$alamat = $_POST ["alamat"];
					$tanggal_pembelian = date("Y-m-d");
					// $totalbelanja = $subharga*$jumlah;
					// foreach ($_SESSION["keranjang"] as $id_produk=> $jumlah){

					// }
					

					$ambil = $koneksi -> query ("SELECT * FROM kurir WHERE id_kurir='$id_kurir'");
					$arraykurir = $ambil -> fetch_assoc();
					$tarif = $arraykurir['tarif'] * count($_SESSION["keranjang"]);

					$total_pembelian = $totalbelanja + $tarif;
					// var_dump($total_pembelian); 
					// die();

					$koneksi -> query ("INSERT INTO pembelian (
					id_pelanggan,id_kurir,tanggal_pembelian, total_pembelian, alamat)
					VALUES ('$id_pelanggan','$id_kurir','$tanggal_pembelian','$total_pembelian', '$alamat')");
						// echo $koneksi->insert_id;

						$id_pembelian_barusan = $koneksi->insert_id;
						// var_dump($id_pembelian_barusan); 
						// die();
						foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
						{
							$koneksi->query("INSERT INTO pembelian_produk 
							VALUES ('', '$id_pembelian_barusan','$id_produk','$jumlah') ");
						}
						unset($_SESSION["keranjang"]);

						echo "<csript>alert alert('Pembelian sukses'); </script>";
						echo "<script>location='index.php?halaman=nota&id=$id_pembelian_barusan';</script>";
				}
				?>
		</div>
	</section> <!--/#cart_items-->
	<!-- <pre> -->
		<?php print_r($_SESSION["kurir "]) ?>
			<!-- </pre> -->
	<!-- <br> -->
	<script src="js/jquery.js"></script>
	<script>
		$(".kurir").change(function () {
			// console.log();
			let kurir = $(this).find(":selected")[0].value;
			$("#id_kurir").prop("disabled", false)
		})
		
		$("#id_kurir").change(function () {
			let kurir = $(this).find(":selected")[0].getAttribute("data-kurir");
			// console.log(ongki);
			let total_belanja = $("#data-total-belanja").val()
			let count_cart = parseInt($("#count_cart").val())
			let a = [].slice.call($(".subharga"))
			a.forEach(element => {
				let subharga = $(element).attr("data-subharga") 
				$(element).html(`Rp${formatRupiah(String((parseInt(subharga) + parseInt(kurir))))}`)
			});
			$("#total-belanja").html(`Rp${formatRupiah(String((parseInt(total_belanja) + (parseInt(kurir) * count_cart))))}`)
			$("td.kurir h4").html(`Rp${formatRupiah(kurir)}`)
		})

		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

	</script>
</body>
</html>