<?php
$ambil = $koneksi->query("SELECT * FROM produk_recommended WHERE id_produk_recommended='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk_recommended'];
if (file_exists("../foto_produk_recommended/$fotoproduk"))
    {
        unlink("../foto_produk_recommended/$fotoproduk");
    }
$koneksi->query("DELETE FROM produk_recommended WHERE id_produk_recommended='$_GET[id]'");
    echo "<script>alert('Produk Terhapus');</script>";
    echo "<script>location='dashboard.php?halaman=produk_recommended';</script>";
?>