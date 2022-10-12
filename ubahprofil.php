<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h2>Ubah Profil</h2>
    <hr>
<?php
$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Lenkap</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan'] ?>">
    </div>
    <div class="form-group">
        <label>E-Mail</label>
        <input type="text" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan'] ?>">
    </div>
    <div class="form-group">
        <label>Nomor Telepon</label>
        <input type="text" name="hp" class="form-control" value="<?php echo $pecah['telepon_pelanggan'] ?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" class="form-control" value="<?php echo $pecah['password_pelanggan'] ?>">
    </div>
    <button class="btn btn-warning" name="ubah">Simpan</button>
    <br>
    <br>
    <br>
    <br>
</form>

<?php
if (isset($_POST['ubah']))
{
    {
        $koneksi->query("UPDATE pelanggan SET email_pelanggan='$_POST[email]',password_pelanggan='$_POST[password]',nama_pelanggan='$_POST[nama]',
        telepon_pelanggan='$_POST[hp]' WHERE id_pelanggan='$_GET[id]'");
    }
    echo "<script>alert('Profil telah diubah');</script>";
    echo "<script>location='index.php?halaman=profil';</script>";
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</main>