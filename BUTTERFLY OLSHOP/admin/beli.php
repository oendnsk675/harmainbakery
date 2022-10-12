<?php
session_start();
// mendapatkan id_produk dari url
$id_produk =$_GET['id_produk'];


//jk sudah ada produk itu di keranjang, maka produk itu jumlahnya di +1
if (isset($session['keranjang'][$id_produk]))
{
	$_SESSION['keranjang'][$_id_produk]+=1;
}
// selainitu (blm ada di keranjang), mk produk itu dianggap dibeli 1
else
{
	$_SESSION['keranjang'][$id_produk] =1;
}



echo "<script>alert('Porduk Sudah Masuk kedalam keranjang')</script>";
echo "<script>location='keranjang.php';</script>";
?>