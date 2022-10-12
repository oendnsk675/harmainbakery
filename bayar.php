<?php
session_start();
// $koneksi = new mysqli("localhost","root","","haramainbakery");
// if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))

// $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
//     ON pembelian.id_pelanggan=pelanggan.id_pelanggan INNER JOIN pembelian_produk ON pembelian_produk.id_pembelian=pembelian.id_pembelian
//     WHERE pembelian.id_pembelian='$_GET[id]'");
//     $pecah_luar = $ambil->fetch_assoc();
?>
<main class="main" style="display: flex; justify-content: center; align-items: center;">
    <div class="col-md-7">
        <div class="alert alert-info">
        <h5>Silahkan melakukan pembayaran <b class="text-danger"> Rp. <?php echo number_format ($totalbelanja); ?></b></h5><br>
            <div class="row">
            <div class="col-md-4">
            <img src="assets/icon/bri.svg" width="82px"><br>
            <strong>No. Rek : 01234567891011</strong><br>
            An. Maya Ristin Maeni
            </div>
            <div class="col-md-4">
            <img src="assets/icon/linkaja.png" width="80px"><br>
            <strong>Nomor : 087800054011</strong><br>
            An. Maya Ristin Maeni
            </div>
            </div>
        </div>
    </div>   
</main>