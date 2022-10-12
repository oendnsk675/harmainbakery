<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h2>Data pembelian</h2>
    <hr>
<table id="example" class="table table-bordered bg-white">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Pemesan</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Total</th>
            <th class="text-center">Status</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan ORDER BY id_pembelian DESC"); ?>
    <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td class="text-center"><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['tanggal_pembelian']; ?></td>
            <td>Rp.<?php echo $pecah['total_pembelian']; ?></td>
            <td class="text-center"><?php echo $pecah['status_pembelian']; ?></td>
            <td>
                <a href="dashboard.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>"
                class="btn-warning btn" style="width: 100%;">Detail</a>
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