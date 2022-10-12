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
$ambil=$koneksi->query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Lenkap</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_lengkap'] ?>">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $pecah['username_admin'] ?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" class="form-control" value="<?php echo $pecah['password_admin'] ?>">
    </div>
    <div class="form-group">
        <img src="foto_admin/<?php echo $pecah['foto_admin'] ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file"  name="foto" class="form-control">
    </div>
    <button class="btn btn-info" name="ubah">Simpan</button>
</form>

<?php
if (isset($_POST['ubah']))
{
    $namafoto=$_FILES['foto']['name'];
    $lokasifoto=$_FILES['foto']['tmp_name'];
    if (!empty($lokasifoto))
    {
        move_uploaded_file($lokasifoto, "foto_admin/$namafoto");

        $koneksi->query("UPDATE admin SET username_admin='$_POST[username]',password_admin='$_POST[password]',
        nama_lengkap='$_POST[nama]',foto_admin='$namafoto' WHERE id_admin='$_GET[id]'");
    }
    else
    {
        $koneksi->query("UPDATE admin SET username_admin='$_POST[username]',password_admin='$_POST[password]',
        nama_lengkap='$_POST[nama]' WHERE id_admin='$_GET[id]'");
    }
    echo "<script>alert('Profil telah diubah');</script>";
    echo "<script>location='dashboard.php?halaman=beranda';</script>";
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</main>