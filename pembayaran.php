<?php
session_start();
$koneksi = new mysqli("localhost","root","","haramainbakery");
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();
// var_dump($detail); 
// die();

$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();
 
$id_pelanggan_beli = $detpem["id_pelanggan"];
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];
if ($id_pelanggan_login !== $id_pelanggan_beli)
{
    echo "<script>alert('Jangan nakal')</script>";
    echo "<script>location='dashboard.php';</script>";
}
?>


<main >
    <div class="container" style="padding-bottom: 10em;">
        <div class="card">
            <div class="card-body">
                <h1>Pembayaran</h1>
                <hr>

                <div class="card alert alert-info">
                    <div class="card-body">
                        <h5>Silahkan melakukan pembayaran <b class="text-danger"> Rp. <?php echo number_format ($detail['total_pembelian']); ?></b>
                        </h5>
                        <div class="row">
                        <div class="col-md-4">
                        <img src="assets/icon/bri.svg" width="82px"><br><br>
                        <strong>No. Rek : 01234567891011</strong><br>
                        An. Maya Ristin Maeni
                        </div>
                        <div class="col-md-4">
                        <img src="assets/icon/linkaja.png" width="80px"><br><br>
                        <strong>Nomor : 087800054011</strong><br>
                        An. Maya Ristin Maeni
                        </div>
                        </div>
                    </div>
                </div>

                <h4>Konfirmasi Pembayaran</h4>
                <p>Kirim bukti pembayaran Anda disini</p>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Bukti</label>
                                <input type="file" required class="form-control" name="bukti">
                                <!-- <p class="text-danger">Foto bukti harus JPG maksimal 2MB</p> -->
                            </div>
                        </div>
                    </div>
                <button class="btn btn-info" name="kirim">Kirim</button>
                </form>
                <?php
                if (isset($_POST['kirim']))
                {
                    $namabukti = $_FILES["bukti"]["name"];
                    $lokasibukti = $_FILES["bukti"]["tmp_name"];
                    $namafiks = date("YmdHis").$namabukti;
                    move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");
    
                    $koneksi->query("UPDATE pembelian SET status_pembelian ='Sudah kirim pembayaran', bukti = '$namafiks'
                    WHERE id_pembelian = '$idpem'");

    
                    echo "<script>alert('Terimakasih sudah mengirimkan bukti pembayaran')</script>";
                    echo "<script>location='index.php?halaman=nota&id=$idpem';</script>";
                }
                ?>
            </div>
        </div>
    </div>
</main>