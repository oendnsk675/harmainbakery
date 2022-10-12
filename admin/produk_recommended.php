<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h2>Data Produk Recommended</h2>
    <br>
    <a href="dashboard.php?halaman=tambahproduk_recommended" class="btn btn-primary">Tambah Data</a>
    <hr>
<table id="example" class="table table-bordered bg-white">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM produk_recommended"); ?>
    <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td class="text-center"><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk_recommended']; ?></td>
            <td> Rp. <?php echo number_format($pecah['harga_produk_recommended']); ?></td>
            <td>
                <center>
                <img src="../foto_produk_recommended/<?php echo $pecah['foto_produk_recommended']; ?>" width="75">
                </center>
            </td> 
            <td >
                <a href="dashboard.php?halaman=hapusproduk_recommended&id=<?php echo $pecah['id_produk_recommended']; ?>"
                class="btn-warning btn ">Hapus</a>
                <a href="dashboard.php?halaman=ubahproduk_recommended&id=<?php echo $pecah['id_produk_recommended']; ?>" class="btn btn-primary ">Ubah</a>
            </td>
        </tr>
    <?php $nomor++; ?>
    <?php } ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</main>