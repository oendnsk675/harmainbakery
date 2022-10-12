<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h2>Profil Pelanggan</h2>
    <hr>
    <?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
    <?php $pecah = $ambil->fetch_assoc(); { ?>
    <div class="row">
        <div class="col-sm-9 col-md-8 col-lg-7">
        <div class="form-group is-required row">
        <div class="col-sm-8">
            <label>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<?php echo $_SESSION["pelanggan"]['nama_pelanggan']; ?></label>
        </div>
        </div>
        <div class="form-group is-required row">
        <div class="col-sm-8">
            <label>E-Mail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<?php echo $pecah['email_pelanggan']; ?></label>
        </div>
        </div>
        <div class="form-group is-required row">
        <div class="col-sm-8">
            <label>Nomor Telepon  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<?php echo $_SESSION["pelanggan"]['telepon_pelanggan']; ?></label>
        </div>
        </div>
        <div class="form-group is-required row">
        <div class="col-sm-8">
            <label>Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $_SESSION["pelanggan"]['password_pelanggan']; ?></label>
        </div>
        </div>
        </div>
    <?php } ?>
    </div>
    <a href="index.php?halaman=ubahprofil&id=<?php echo $pecah ['id_pelanggan'];
    ?>" class="btn btn-warning">Ubah Profil</a>
    <br>
    <br>
    <br>
    <br>
    </div>
    </div>
    </div>
    </div>
    </div>
</main>

