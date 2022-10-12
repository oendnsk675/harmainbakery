<?php 
    $id_pembelian_produk = $_GET['id'];
    $ambil=$koneksi->query("SELECT * FROM pembelian_produk 
    JOIN produk ON pembelian_produk.id_produk=produk.id_produk
    JOIN pembelian ON  pembelian_produk.id_pembelian = pembelian.id_pembelian  
    JOIN kurir ON pembelian.id_kurir = kurir.id_kurir
    JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan
    WHERE pembelian_produk.id_pembelian_produk = '$id_pembelian_produk'"); 
    $data = $ambil->fetch_assoc();
?>
<main class="c-main">
    <div class="container-fluid ">
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h1>Invoice</h1>
                                <a style="display: none;" href="./cetak_invoice.php?id=<?= $_GET['id'] ?>">Cetak</a>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <span>Nama Pemesan &nbsp; : <strong> &nbsp; <?php echo $data['nama_pelanggan']; ?></strong></span>
                                    <span>Alamat pengiriman &nbsp; :<strong> &nbsp; <?php echo $data['alamat']; ?></strong></span>
                                    <div><span>No Invoice: &nbsp; &nbsp;</span><strong class="text-warning">Invoice-<?php echo $data['id_pembelian']; ?></strong></div>
                                    <span>Tanggal &nbsp; &nbsp; : <strong> &nbsp; <?php echo $data['tanggal_pembelian']; ?></strong></span>
                                </div>
                                <div>
                                    <!-- <span>
                                        <strong>Pembayaran</strong>
                                        <span> Mandiri e-cash</span>
                                    </span> -->

                                </div>
                            </div>
                            <hr>
                            
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
            </div>
        </div>
    </div>
</main>