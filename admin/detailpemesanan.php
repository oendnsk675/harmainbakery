<?php
$ambil = $koneksi->query("SELECT * FROM pemesanan JOIN pelanggan 
    ON pemesanan.id_pelanggan=pelanggan.id_pelanggan INNER JOIN pemesanan_paket ON pemesanan_paket.id_pemesanan=pemesanan.id_pemesanan
    WHERE pemesanan.id_pemesanan='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h1>Data Pemesanan</h1>
    <hr>
        Nama Pemesan &nbsp; : &nbsp; <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
        <p>
        No. Telpon &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; <?php echo $detail['telepon_pelanggan']; ?> <br>
        E-Mail &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;<?php echo $detail['email_pelanggan']; ?><br>
        Tanggal &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;<?php echo $detail['tanggal_pemesanan']; ?> <br>
        </p>
    <hr>
    </div>
    <div class="card-body p-0" style="min-height: 300px">
    <div class="table-responsive"> 
    <tbody>
    <?php
        $ambil = $koneksi->query("SELECT * FROM pemesanan_paket WHERE id_pemesanan_paket='$_GET[id]'");
        $pecah = $ambil->fetch_assoc();
    
        echo "<pre>";
        print_r($pecah);
        echo "</pre>";
    ?>

    </tbody>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</main>