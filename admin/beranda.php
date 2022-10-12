<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
    <h2>Selamat Datang Administrator</h2>
    <hr>
    <?php $ambil=$koneksi->query("SELECT * FROM admin"); ?>
    <?php while($pecah = $ambil->fetch_assoc()){ ?>
    <div class="row">
        <div class="col-sm-9 col-md-8 col-lg-7">
        <div class="form-group is-required row">
        <label class="col col-label">Nama Lengkap</label>
        <div class="col-sm-8">
            <td><?php echo $pecah['nama_lengkap']; ?></td>
        </div>
        </div>
        <div class="form-group is-required row">
        <label class="col col-label">Username</label>
        <div class="col-sm-8">
            <td><?php echo $pecah['username_admin']; ?></td>
        </div>
        </div>
        <div class="form-group is-required row">
        <label class="col col-label">ID Admin</label>
        <div class="col-sm-8">
            <td><?php echo $pecah['id_admin']; ?></td>
        </div>
        </div>
        <div class="form-group is-required row">
        <label class="col col-label">Password</label>
        <div class="col-sm-8">
            <td><?php echo $pecah['password_admin']; ?></td>
        </div>
        </div>
        </div>
        <div class="col">
        <div class="form-group">
        <label class="">Foto Profil</label>
        <div>
            <img src="foto_admin/<?php echo $pecah['foto_admin']; ?>" width="130">    
        </div>
        </div>
    </div>
    <?php } ?>
    </div>
    <a href="dashboard.php?halaman=ubahprofil&id=<?php echo $pecah ['id_produk'];
    ?>" class="btn btn-warning">Ubah Profil</a>
    </div>
    </div>
    </div>
    </div>
    </div>
</main>

