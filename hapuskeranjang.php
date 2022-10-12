<?php
session_start();
$id_produk = $_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('Produk dihapus dari keranjang');</script>";
echo "<script>location='index.php?halaman=cart';</script>";
?>