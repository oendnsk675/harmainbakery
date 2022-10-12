<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h2>Ubah Produk Recommended</h2>
    <hr>
<?php
$ambil=$koneksi->query("SELECT * FROM produk_recommended WHERE id_produk_recommended='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk_recommended'] ?>">
    </div>
    <div class="form-group">
        <img src="../foto_produk_recommended/<?php echo $pecah['foto_produk_recommended'] ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file"  name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"rows="10"><?php echo $pecah['deskripsi_produk_recommended']; ?>
        </textarea>
    </div>
    <button class="btn btn-info" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah']))
{
    $namafoto=$_FILES['foto']['name'];
    $lokasifoto=$_FILES['foto']['tmp_name'];
    if (!empty($lokasifoto))
    {
        move_uploaded_file($lokasifoto, "../foto_produk_recommended/$namafoto");

        $koneksi->query("UPDATE produk_recommended SET nama_produk_recommended='$_POST[nama]',
        foto_produk_recommended='$namafoto',deskripsi_produk_recommended='$_POST[deskripsi]'
        WHERE id_produk_recommended='$_GET[id]'");
    }
    else
    {
        $koneksi->query("UPDATE produk_recommended SET nama_produk_recommended='$_POST[nama]',
        deskripsi_produk_recommended='$_POST[deskripsi]' WHERE id_produk_recommended='$_GET[id]'");
    }
    echo "<script>alert('data catalog telah diubah');</script>";
    echo "<script>location='dashboard.php?halaman=produk_recommended';</script>";
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</main>