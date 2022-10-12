<?php
session_start();
$koneksi = new mysqli("localhost","root","","haramainbakery");
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))

    $query = $koneksi->query("SELECT * FROM `pembelian` 
    INNER JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan
    INNER JOIN  `pembelian_produk` ON pembelian.id_pembelian = pembelian_produk.id_pembelian
    INNER JOIN `produk` ON pembelian_produk.id_produk = produk.id_produk
    INNER JOIN `kurir` ON pembelian.id_kurir = kurir.id_kurir
    WHERE pembelian.id_pembelian = '$_GET[id]'");

    $query2 = $koneksi->query("SELECT * FROM `pembelian` 
    INNER JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan
    INNER JOIN  `pembelian_produk` ON pembelian.id_pembelian = pembelian_produk.id_pembelian
    INNER JOIN `produk` ON pembelian_produk.id_produk = produk.id_produk
    INNER JOIN `kurir` ON pembelian.id_kurir = kurir.id_kurir
    WHERE pembelian.id_pembelian = '$_GET[id]'");
    $pecahluar = $query2->fetch_assoc();
    // while ($data = mysqli_fetch_assoc($query)) {
    //     # code...
    // }
    // var_dump($datad); 
    // die();
?>
	<!-- <pre> -->
		<?php print_r($_SESSION["produk"]) ?>
	<!-- </pre> -->
<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h2>Nota Pembelian</h2>
    <div style="width: 100%; display: flex;">
        <div style="width: 13%;">Nama Pemesan</div>
        <div><strong>: <?php echo $_SESSION["pelanggan"]['nama_pelanggan']; ?></strong> </div>
    </div>
    <div style="width: 100%; display: flex;">
        <div style="width: 13%;">Alamat pengiriman</div>
        <div><strong>: <?= $pecahluar['alamat'] ?></strong></div>
    </div>
    <div style="width: 100%; display: flex;">
        <div style="width: 13%;">Nama Pemesan</div>
        <div><strong>: <?php echo $_SESSION["pelanggan"]["telepon_pelanggan"] ?></strong></div>
    </div>
    <div style="width: 100%; display: flex;">
        <div style="width: 13%;">Email</div>
        <div><strong>: <?php echo $_SESSION["pelanggan"]["email_pelanggan"] ?></strong></div>
    </div>
        <?php
                $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

                $ambil = $koneksi->query("SELECT * FROM pembelian
                WHERE pembelian.id_pembelian='$_GET[id]'");
                $pecah = $ambil->fetch_assoc();
                ?>
        <div class="d-flex justify-content-between" style="display: flex; justify-content: space-between; margin-top: 3rem;">
            <p class="text-warning font-bold">
            Invoice-<?php echo $pecah["id_pembelian"] ?> <br>
            </p>
            <p class="text-right">
            Tanggal : <?php echo $pecah["tanggal_pembelian"] ?> <br>
            </p>
        </div>
    </div>
    <div class="card-body p-3" style="min-height: 300px">
    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
        <th class="text-center">No</th> 
        <th class="text-center">Kode Pembayaran</th>
        <th class="text-center">Nama Produk</th>
        <th class="text-center">Jumlah</th>
        <th class="text-center">Harga</th>
        <th class="text-center">Biaya Ongkir</th>
        <th class="text-center">Status</th>
        <th class="text-center">Subtotal</th>
        </tr>
        </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $total_pembayaran?>
        <?php while ($data = mysqli_fetch_assoc($query)): ?>
            <tr class="invoice-status-paid" style="transform: rotate(0);">
                <td class="text-center"><?php echo $nomor++; ?></td>
                <td class="text-center">Invoice-<?php echo $pecah["id_pembelian"] ?></td>
                <td class="text-center"><?php echo $data['nama_produk']; ?></td>
                <td class="text-center"><?php echo $data['jumlah'] ?></td>
                <td class="text-center">Rp<?= number_format($data['harga_produk']); ?></td>
                <td class="text-center">Rp<?= number_format($data['tarif']); ?></td>
                <td class="text-center"><?php echo $data['status_pembelian']; ?></td>
                <td class="text-center">Rp<?= number_format($data['harga_produk'] + $data['tarif']) ?></td>
            </tr>
            <?php $total_pembayaran = $data['total_pembelian']?>
        <?php endwhile ?>
    </tbody>
    </table>

    <div style="width: 100%; display: flex; align-items: end; flex-direction: column;">
        <div class="d-flex" style="margin-bottom: 1rem;">
            <b>Total Pembayaran : </b>
            <span><?= number_format($total_pembayaran) ?></span>
        </div>
        <a href="index.php?halaman=pembayaran&id=<?= $_GET['id'] ?>" class="btn btn-info"><i class="fas fa-money-bill-wave"></i>&nbsp; Bayar Sekarang</a>
    </div>

   
    <br>
    <br>
    </div>
    </div>
    </div>
    </div>
    </div>
</main>