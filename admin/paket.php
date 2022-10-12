<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h2>Data Paket dan Harga</h2>
    <br>
    <a href="dashboard.php?halaman=tambahpaket" class="btn btn-info">Tambah Data</a>
    <hr>
<table id="example" class="table table-bordered bg-white">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Paket</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Deskripsi</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM paket"); ?>
    <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td class="text-center"><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_paket']; ?></td>
            <td><?php echo $pecah['harga_paket']; ?></td>
            <td><?php echo $pecah['deskripsi_paket']; ?></td>
            <td>
            <a href="dashboard.php?halaman=ubahpaket&id=<?php echo $pecah['id_paket']; ?>" class="btn btn-info ">Ubah</a>
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