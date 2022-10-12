<?php
session_start();
$koneksi = new mysqli("localhost","root","","haramainbakery");

if (!isset($_SESSION['admin']))
{
  echo "<script>alert('Anda Harus Login');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Beranda - Haramain Bakery</title>
<meta name="description" content="Solusi pernikahan lebih hemat, praktis, dan kekinian dengan e-invitation yang disebar otomatis untuk memberikan kesan terbaik. Daftar sekarang, Gratis!">

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../image/data_ulem/faviconnew.png">
<link rel="icon" type="image/png" sizes="16x16" href="../image/data_ulem/faviconnew.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#428af5">
<meta name="apple-mobile-web-app-title" content="Wedew">
<meta name="application-name" content="Wedew">
<meta name="msapplication-TileColor" content="#428af5">
<meta name="theme-color" content="#ffffff">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="css/combine.css" rel="stylesheet">
<link href="css/account.css" rel="stylesheet">

<script src="https://www.googleoptimize.com/optimize.js?id=OPT-M4R5VVB"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
<link rel="stylesheet" href="css/8b02f5c39d5344fac9daaecf837ce47f-1652473542.css">


<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
    <div class="c-app">
    <div class="c-sidebar c-sidebar-light c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand bg-white d-md-down-none">
    <img class="c-sidebar-brand-full" src="../images/home/logo.png" alt="" height="40">
    <img class="c-sidebar-brand-minimized" src="../images/home/logo.png" alt="" height="30">

    </div>
    <ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item bg-light d-lg-none">
        <a href="#" class="btn btn-outline-secondary btn-lg btn-block border-0 text-left" style="border-radius: 0;" data-control="modal" data-handler="tenantSession::onShowTenantSwitcherModal" data-partial="modal-tenant-switcher"><span><strong>Haramain Bakery</strong></span> <i class="fa fa-caret-down fa-fw"></i></a>
    </li>
    <li class="c-sidebar-nav-item bg-light d-lg-none">
        <div class="px-3 pb-3">
        <div class="d-flex">
            <span class="pr-2 tenant-published-switch">
            <label class="c-switch c-switch-sm c-switch-pill c-switch-opposite-success mt-3">
            <input class="c-switch-input" type="checkbox" name="unpublish" checked data-request="onSetPublished" data-request-update="'tenant-published-switch': '.tenant-published-switch'">
            <span class="c-switch-slider"></span>
            </label> </span>
        <div class="py-2 mt-2 d-inline-block">Publikasikan</div>
        </div>
        <div class="mb-2">
        <a href="https://febizam.wedew.id" class="btn btn-sm btn-outline-primary" target="_blank">febizam.wedew.id</a>
        </div>
        </div>
    </li>
    <br>
    <br>
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
        <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="dashboard.php?halaman=beranda">
        <img class="c-sidebar-nav-link-img mr-3" src="assets/images/tab-home-active.svg" alt="">
        <img class="c-sidebar-nav-link-img-active mr-3" src="assets/images/tab-home-active.svg" alt="">
        Beranda
        </a>
        </li>
        <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="dashboard.php?halaman=produk">
        <img class="c-sidebar-nav-link-img mr-3" src="assets/images/tab-donations-active.svg" alt="">
        <img class="c-sidebar-nav-link-img-active mr-3" src="assets/images/tab-donations-active.svg" alt="">
        Produk
        </a>
        </li>
        <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="dashboard.php?halaman=produk_recommended">
        <img class="c-sidebar-nav-link-img mr-3" src="assets/images/tab-gifts-active.svg" alt="">
        <img class="c-sidebar-nav-link-img-active mr-3" src="assets/images/tab-gifts-active.svg" alt="">
        Produk Recommended
        </a>
        </li>
        <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="dashboard.php?halaman=pembelian">
        <img class="c-sidebar-nav-link-img mr-3" src="assets/images/tab-messages-active.svg" alt="">
        <img class="c-sidebar-nav-link-img-active mr-3" src="assets/images/tab-messages-active.svg" alt="">
        Pembelian
        </a>
        </li>
        <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="dashboard.php?halaman=pelanggan">
        <img class="c-sidebar-nav-link-img mr-3" src="assets/images/tab-guests-active.svg" alt="">
        <img class="c-sidebar-nav-link-img-active mr-3" src="assets/images/tab-guests-active.svg" alt="">
        Pelanggan
        </a>
        </li>
        <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="dashboard.php?halaman=laporan">
        <img class="c-sidebar-nav-link-img mr-3" src="assets/images/tab-guestbooks-active.svg" alt="">
        <img class="c-sidebar-nav-link-img-active mr-3" src="assets/images/tab-guestbooks-active.svg" alt="">
       Laporan
        </a>
        </li>
        </ul>
        </nav>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
        </div>
        <div class="c-wrapper c-fixed-components">
  <header class="c-header c-header-light c-header-fixed c-header-with-subheader bg-warning">
      <?php $ambil=$koneksi->query("SELECT * FROM admin"); ?>
      <?php while($pecah = $ambil->fetch_assoc()){ ?>
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                <i class="fa fa-bars"></i>
            </button>
                <a class="c-header-brand d-lg-none mx-3" href="dashboard.php">
                <img src="../images/home/logo.png" alt="" height="40">
            </a>

            <ul class="c-header-nav ml-auto mr-4">
                <li class="c-header-nav-item dropdown">
                  <a class="c-header-nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="c-avatar mr-2">
                    <img src="foto_admin/<?php echo $pecah['foto_admin']; ?>" height="35" width="35" class="c-avatar-img">
                    </div>
                    <span class="d-md-down-none text-white"><?php echo $pecah['nama_lengkap']; ?></span>
                  </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2">
                <strong><?php echo $pecah['username_admin']; ?></strong>
                </div>
                <a class="dropdown-item" href="dashboard.php?halaman=ubahprofil&id"><i class="c-icon mfe-2 fa fa-user"></i> Ubah Profil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php"><i class="c-icon mr-2 fa fa-power-off"></i> Keluar</a>
                </div>
                </li>
            </ul>
      <?php } ?>
</header>
  <main class="card-body">
    <div id="page-wrapper">
    <div id="page-inner">
    <?php
    error_reporting (E_ALL ^ E_WARNING||E_NOTTICE);
    if (isset($_GET['halaman']))
    {
      if ($_GET['halaman']=="beranda")
      {
        include 'beranda.php';
      }
      elseif ($_GET['halaman']=="produk")
      {
        include 'produk.php';
      }
      elseif ($_GET['halaman']=="produk_recommended")
      {
        include 'produk_recommended.php';
      }
      elseif ($_GET['halaman']=="pembelian")
      {
        include 'pembelian.php';
      }
      elseif ($_GET['halaman']=="pelanggan")
      {
        include 'pelanggan.php';
      }
      elseif ($_GET['halaman']=="laporan_pembelian.php")
      {
        include 'laporan_pembelian.php';
      }
      elseif ($_GET['halaman']=="detail")
      {
        include 'detail.php';
      }
      elseif ($_GET['halaman']=="tambahproduk")
      {
        include 'tambahproduk.php';
      }
      elseif ($_GET['halaman']=="hapusproduk")
      {
        include 'hapusproduk.php';
      }
      elseif ($_GET['halaman']=="ubahproduk")
      {
        include 'ubahproduk.php';
      }
      elseif ($_GET['halaman']=="tambahproduk_recommended")
      {
        include 'tambahproduk_recommended.php';
      }
      elseif ($_GET['halaman']=="hapusproduk_recommended")
      {
        include 'hapusproduk_recommended.php';
      }
      elseif ($_GET['halaman']=="ubahproduk_recommended")
      {
      include 'ubahproduk_recommended.php';
      }
      elseif ($_GET['halaman']=="logout")
      {
        include 'logout.php';
      }
      elseif ($_GET['halaman']=="ubahprofil")
      {
        include 'ubahprofil.php';
      }
      elseif ($_GET['halaman']=="detailpembelian")
      {
        include 'detailpembelian.php';
      }
      elseif ($_GET['halaman']=="laporan")
      {
        include 'laporan.php';
      }
  
    }
    else
    {
      include 'beranda.php';
    }
    ?>
    </div>
    </div>
  </main>
</div>
</div>
</body>
    <footer class="c-footer-centar">
      <div class="footer-bottom">
        <div class="container text-center text-muted">
            <div class="copyright float-center">
            <script>
                document.write(new Date().getFullYear())
            </script>,&nbsp;<a target="_blank" href="../index.php" target="_blank"><b>haramainbakery</b></a>.
            </div>
        </div>
        </div>
    </footer>
<script>
        const WEDEW_REGION = 'id'
    </script>
<script src="https://dashboard.wedew.id/combine/69d7aa1c641a03e39e17a465726d6387-1652473543.js"></script>
<script src="https://dashboard.wedew.id/combine/6980669031420028dff5d5526d469b59-1654518262.js"></script>
<script async src="https://cdn.nolt.io/widgets.js"></script>
<script>window.noltQueue=window.noltQueue||[];function nolt(){noltQueue.push(arguments)}</script>
<script async src="js/jquery.dataTables.min.js"></script>
<script async src="js/dataTables.bootstrap4.min.js"></script>
<script async src="js/jquery-3.5.1.js"></script>
<script>
$(document).ready(function () {
    $('#example').DataTable();
});

</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109046254-1"></script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1987795774768206&ev=PageView&noscript=1"
  alt="..."
/></noscript>
</body>
</html>