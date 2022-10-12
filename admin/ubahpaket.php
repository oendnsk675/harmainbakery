<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h2>Ubah Paket</h2>
    <hr>
<?php
$ambil=$koneksi->query("SELECT * FROM paket WHERE id_paket='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo "<pre>";
print_r ($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Paket</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_paket'] ?>">
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="number" class="form-control" name="harga"><?php echo $pecah['harga_paket']; ?>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"rows="10"><?php echo $pecah['deskripsi_paket']; ?>
        </textarea>
    </div>
    <button class="btn btn-info" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah']))
{
    {
        $koneksi->query("UPDATE paket SET nama_paket='$_POST[nama]',harga_paket='$_POST[harga]',
        deskripsi_paket='$_POST[deskripsi]' WHERE id_paket='$_GET[id]'");
    }
    echo "<script>alert('data paket telah diubah');</script>";
    echo "<script>location='dashboard.php?halaman=paket';</script>";
}
?> 
</div>
</div>
</div>
</div>
</div>
</div>
</main>