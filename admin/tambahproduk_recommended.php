<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h2>Tambah Produk</h2>
    <hr>
<form class="color:#red" method="post" enctype="multipart/form-data">
    <div class="form-grup">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <br>
    <div class="form-grup">
        <label>Harga</label>
        <input type="text" class="form-control" name="harga"></input>
    </div>
    <br>
    <div class="form-grup">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <br>
    <button class="btn btn-info" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save']))
{
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "../foto_produk_recommended/".$nama);
    $koneksi->query("INSERT INTO produk_recommended
    (nama_produk_recommended,harga_produk_recommended,foto_produk_recommended)
    VALUES ('$_POST[nama]','$_POST[harga]','$nama')");

    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=produk_recommended'>";
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</main>