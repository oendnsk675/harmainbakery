<?php
session_start();
$koneksi = new mysqli("localhost","root","","haramainbakery");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Haramain Bakery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700|Poppins:200,400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<script src="https://www.googleoptimize.com/optimize.js?id=OPT-M4R5VVB"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<br>
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0877 4477 5444</a></li>
								<li><a href="#"><i class="fab fa-instagram"></i>&nbsp @haramainbakery_</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<br>
						<div class="social-icons pull-right">
						<?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
      					<?php $pecah = $ambil->fetch_assoc(); {
						?>
						<a href="index.php?halaman=profil">

							<ul class="c-header-nav ml-auto mr-4">
								<li class="c-header-nav-item dropdown">
									<div class="c-avatar mr-2">
									<img src="images/icon_profil.png" height="35" width="35" class="c-avatar-img">
									</div>
								</li>
								<li>
								<span>	
								<?php if(isset($_SESSION["pelanggan"]['nama_pelanggan'])):?>
									<span class="d-md-down-none" style="color:white"><?php echo $_SESSION["pelanggan"]['nama_pelanggan']; ?></span>
								<?php endif?>
								</sp>
								</li>
							</ul>
						</a>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php?halaman=home"><img src="images/home/logo.png" width="100px" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="index.php?halaman=cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php if (isset($_SESSION["pelanggan"])): ?>
									<li> <a href="index.php?halaman=logout"><i class="fa fa-lock"></i> Logout</a></li>
								<?php else: ?>
									<li> <a href="index.php?halaman=login"><i class="fa fa-lock"></i> Login</a></li>
								<?php endif ?>
								<li><a href="index.php?halaman=checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="index.php?halaman=transaction"><i class="fa fa-list-alt"></i> Transaction</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php?halaman=home" class="active">Home</a></li> 
								<li><a href="index.php?halaman=contact-us">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<?php
    error_reporting (E_ALL ^ E_WARNING||E_NOTTICE);
    if (isset($_GET['halaman']))
    {
      if ($_GET['halaman']=="home")
      {
        include 'home.php';
      }
      elseif ($_GET['halaman']=="blog")
      {
        include 'blog.php';
      }
      elseif ($_GET['halaman']=="blog-single")
      {
        include 'blog-single.php';
      }
      elseif ($_GET['halaman']=="cart")
      {
        include 'cart.php';
      }
      elseif ($_GET['halaman']=="checkout")
      {
        include 'checkout.php';
      }
      elseif ($_GET['halaman']=="contact-us")
      {
        include 'contact-us.php';
      }
      elseif ($_GET['halaman']=="login")
      {
        include 'login.php';
      }
	  elseif ($_GET['halaman']=="logout")
      {
        include 'logout.php';
      }
      elseif ($_GET['halaman']=="product-details")
      {
        include 'product-details.php';
      }
      elseif ($_GET['halaman']=="sendemail")
      {
        include 'sendemail.php';
      }
      elseif ($_GET['halaman']=="shop")
      {
        include 'shop.php';
      }
      elseif ($_GET['halaman']=="detailpembelian")
      {
        include 'detailpembelian.php';
      }
	  elseif ($_GET['halaman']=="profil")
      {
        include 'profil.php';
      }
	  elseif ($_GET['halaman']=="ubahprofil")
      {
        include 'ubahprofil.php';
	  }
	  elseif ($_GET['halaman']=="nota")
      {
        include 'nota.php';
	  }
	  elseif ($_GET['halaman']=="pembayaran")
      {
        include 'pembayaran.php';
	  }
	  elseif ($_GET['halaman']=="transaction")
      {
        include 'transaction.php';
	  }
  
    }
    else
    {
      include 'home.php';
    }
    ?>
	


	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
						<ul class="social-media-list">
						<li>
							<h2>Kontak</h2>
							<a href="https://www.instagram.com/haramainbakery_/">
								<p><i class="fab fa-instagram"></i>&nbsp; <b>Instagram</b><br>
								@haramainbakery_</p>
							</a>
						</li>
						</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="companyinfo">
						<ul class="social-media-list">
						<li>
							<br><br>
							<a href="https://api.whatsapp.com/message/GFPSDNMDQEW4J1?autoload=1&app_absent=0">
								<p><i class="fab fa-whatsapp"></i>&nbsp; <b>WhatsApp</b><br>
								+62 87744775444</p>
							</a>
						</li>
						</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="companyinfo">
						<ul class="social-media-list">
						<li>
							<br><br>
							<a href="https://api.whatsapp.com/send?phone=+6285205133314&text=Hay+CentralDesign.id+mau+tanya-tanya+donk%0ANama+:">
								<p><i class="fa fa-envelope"></i>&nbsp; <b>E-Mail</b><br>
								haramainbakery@gmail.com</p>
							</a>
							</a>
						</li>
						</ul>
						</div>
					</div>
					<div class="col-sm-4">
					<div class="companyinfo">
					<ul class="social-media-list">
					<li>
					<br><br>
					<a href="https://goo.gl/maps/RCtubfpLNfALgvhP6">
						<p><i class="fa fa-map-marker-alt"></i>&nbsp; <b>Address</b><br>
						Jln. Tegal Banyu Lembuak Narmada, Narmada - NTB</p>
						</a>
					</li>
					</ul>
				</div>
				</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2022 HARAMAIN BAKERY Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="">Maya Ristin Maeni</a></span></p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
	

  
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>