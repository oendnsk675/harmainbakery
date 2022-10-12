<?php
session_start();
$koneksi = new mysqli("localhost","root","","haramainbakery");
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
	$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
	if (!isset($_SESSION["pelanggan"]))
	{
		echo "<script>alert('Silahkan login');</script>";
		echo "<script>location='index.php?halaman=login';</script>";
	}
	
    $query = $koneksi->query("SELECT * FROM `pembelian` 
    INNER JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan
    INNER JOIN  `pembelian_produk` ON pembelian.id_pembelian = pembelian_produk.id_pembelian
    INNER JOIN `produk` ON pembelian_produk.id_produk = produk.id_produk
    INNER JOIN `kurir` ON pembelian.id_kurir = kurir.id_kurir
    WHERE pembelian.id_pelanggan = '$id_pelanggan'");
    // while ($data = mysqli_fetch_assoc($query)) {
		//     # code...
		// }
	// $data = $query->fetch_assoc();
    // var_dump($data); 
    // die();
	
?>

<!DOCTYPE html>
<html lang="en">
<body>
	<section id="cart_items">
		<div class="container" style="padding-bottom: 15em;">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php?halaman=cart">Cart</a></li>
				  <li class="active">Transaction</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<th class="text-center">No.</th>
							<th class="text-center">Nama Produk</th>
							<th class="text-center">Jumlah</th>
							<th class="text-center">Harga</th>
							<th class="text-center">Biaya Ongkir</th>
							<th class="text-center">Status</th>
							<th class="text-center">Total</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; ?>
					<?php while ($data = mysqli_fetch_assoc($query)): ?>
						<tr>
							<td class="text-center cart_description">
								<h4><?= $no ?></h4>
							</td>
							<td class="text-center cart_description">
								<h4><a href=""><?php echo $data['nama_produk']; ?></a></h4>
							</td>
							<td class="text-center cart_price">
								<h4><?php echo number_format ($data['jumlah']); ?></h4>
							</td>
							<td class="text-center cart_quantity">
								<h4><?php echo number_format ($data['harga_produk']); ?></h4>
							</td>
							<td class="text-center kurir">
								<h4><?php echo number_format ($data['tarif']); ?></h4>
							</td>
							<td class="text-center cart_total">
								<h4><?php echo $data['status_pembelian'] ?></h4>
							</td>
							<td class="text-center cart_total">
								<h4><?php echo number_format($data['harga_produk'] + $data['tarif']) ?></h4>
							</td>
							<td class="text-center cart_total">
								<a href="beli.php?id=<?= $data['id_produk'] ?>" class="btn btn-info">Beli Lagi</a>
							</td>
						</tr>
					<?php $no++; ?>
					<?php endwhile ?>
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