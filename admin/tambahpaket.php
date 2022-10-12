<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h2>Tambah Paket</h2>
    <hr>
<form method="post" enctype="multipart/form-data">
    <div class="form-grup">
        <label>Nama Paket</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <br>
    <div class="form-grup">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="harga">
    </div>
    <br>
    <div class="form-grup">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <br>
    <button class="btn btn-info" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save']))
{
    $koneksi->query("INSERT INTO paket
    (nama_paket,harga_paket,deskripsi_paket)
    VALUES ('$_POST[nama]','$_POST[harga]','$_POST[deskripsi]')");

    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=paket'>";
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</main>