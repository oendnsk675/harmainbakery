<?php

session_start();
$koneksi = new mysqli("localhost","root","","haramainbakery");

if (!isset($_SESSION['admin']))
{
  echo "<script>alert('Anda Harus Login');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}

?>
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h1>Invoice</h1>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span>Nama Pemesan &nbsp; <strong> &nbsp; <?php echo $detail['nama_pelanggan']; ?></strong></span>
                                    <span>No Invoice &nbsp; &nbsp; <strong> &nbsp; <?php echo $detail['nama_pelanggan']; ?></strong></span>
                                    <span>Tanggal &nbsp; &nbsp; <strong> &nbsp; <?php echo $detail['nama_pelanggan']; ?></strong></span>
                                </div>
                                <div>
                                    <span>
                                        <strong>Pembayaran</strong>
                                        <span> Mandiri e-cash</span>
                                    </span>

                                </div>
                            </div>
                            <hr>
                            <?php 
                                $id_pembelian_produk = $_GET['id'];
                                $ambil=$koneksi->query("SELECT *, pembelian.id_ongkir FROM pembelian_produk 
                                JOIN produk ON pembelian_produk.id_produk=produk.id_produk
                                JOIN pembelian ON  pembelian_produk.id_pembelian = pembelian.id_pembelian  
                                JOIN ongkir ON pembelian.id_ongkir = ongkir.id_ongkir
                                WHERE pembelian_produk.id_pembelian_produk = '$id_pembelian_produk'"); 
                                $data = $ambil->fetch_assoc();
                            ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="40%">Nama Produk</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Ongkir</th>
                                        <th width="20%" class="text-center">Harga Produk</th>
                                        <th class="text-center">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $data["nama_produk"]?></td>
                                        <td class="text-center"><?= $data["jumlah"]?></td>
                                        <td class="text-center"><?= $data["tarif"]?></td>
                                        <td class="text-center"><?= number_format($data["harga_produk"]) ?></td>
                                        <td class="text-center"><?= number_format($data["harga_produk"] * $data["jumlah"]) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex w-100 justify-content-between">
                                <strong>Total Pembayaran</strong>
                                <strong class="pe-5">Rp<?= number_format($data["harga_produk"] * $data["jumlah"])?></strong>
                            </div>
                        </div>
                    </div>
                </div>