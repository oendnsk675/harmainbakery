<?php
session_start();
$koneksi = new mysqli("localhost","root","","haramainbakery");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
<title>Login - Haramain Bakery</title>
<meta name="description" content="Login sekarang untuk sebar undangan yang lebih cepat dan tepat!">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<meta itemprop="name" content="Login - Wedew">
<meta itemprop="description" content="Login sekarang untuk sebar undangan yang lebih cepat dan tepat!">
<meta itemprop="image" content="assets/meta-image.jpg">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@wedewid">
<meta name="twitter:title" content="Login - Wedew">
<meta name="twitter:description" content="Login sekarang untuk sebar undangan yang lebih cepat dan tepat!">

<meta name="twitter:image:src" content="assets/meta-image.jpg">

<meta property="og:type" content="website">
<meta property="og:title" content="Login - Wedew">
<meta property="og:url" content="login.php">
<meta property="og:image" content="assets/meta-image.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:description" content="Login sekarang untuk sebar undangan yang lebih cepat dan tepat!">
<meta property="og:site_name" content="Wedew">

<meta property="fb:app_id" content="119077032012740">
<meta property="fb:page_id" content="1679866692040649">
<link rel="canonical" href="login.html">

<link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../image/data_ulem/faviconnew.png">
<link rel="icon" type="image/png" sizes="16x16" href="../image/data_ulem/faviconnew.png">
<link rel="manifest" href="assets/site.webmanifest">
<link rel="mask-icon" href="assets/safari-pinned-tab.svg" color="#428af5">
<meta name="apple-mobile-web-app-title" content="Wedew">
<meta name="application-name" content="Wedew">
<meta name="msapplication-TileColor" content="#428af5">
<meta name="theme-color" content="#ffffff">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700|Poppins:200,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

<link href="css/combine.css" rel="stylesheet">

<script src="https://www.googleoptimize.com/optimize.js?id=OPT-M4R5VVB"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">


<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5CMCK3S');</script>


<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
<section class="bg-dark" style="background-image: url(../images/bg.jpg); background-size: cover; background-position: center;">
<div class="container py-5">
<div class="row justify-content-center">
<div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
<div class="my-5 text-center">
    <a href="../index.php">
        <img src="../image/data_ulem/logo.png" alt="" height="50">
    </a>
</div>
    <div class="card">
    <div class="card-body">
        <h1 class="h3">Login</h1>
        <hr>
    <form method="POST" action="login.php"><input name="_session_key" type="hidden">
    <div class="form-group">
        <label for="userSigninLogin">Email</label>
        <input name="user" type="text" class="form-control" id="userSigninLogin" tabindex="1" autofocus required>
    </div>
    <div class="collapse" id="userSigninPasswordForm">
    <div class="form-group">
        <label for="userSigninPassword">Password</label>
        <input name="pass" type="password" class="form-control" id="userSigninPassword" tabindex="2" required>
    </div>
    <div class="form-group text-center">
        <button class="btn btn-info" name="login">Masuk</button>
    </div>
    </div>
    </form>
    <?php
    if (isset($_POST['login']))
    {
        $ambil = $koneksi->query("SELECT * FROM admin WHERE username_admin='$_POST[user]'
        AND password_admin ='$_POST[pass]'");
        $yangcocok = $ambil->num_rows;
        if ($yangcocok==1)
        {
            $_SESSION['admin']=$ambil->fetch_assoc();
            echo "<div class='alert alert-info'>Login Sukses</div>";
            echo "<meta http-equiv='refresh' content='1;url=dashboard.php'>";
        }
        else
        {
            echo "<div class='alert alert-danger'>Login Gagal</div>";
            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        }
    }
    ?>
    <div class="mt-4 text-center">
        <p>
        <small>Belum punya akun?</small>
        </p>
    <button class="btn btn-info" href="daftar.php">Daftar Sekarang</button>
    </div>
    </div>
    </div>
    </div>
</div>
</section>
<footer>
<div class="container">
<div class="">
<div class="row">
<div class="col-md text-md-center">
<div class="mb-2">
<h6><div class="text-muted">Metode Pembayaran</div></h6>
<img src="assets/images/payment-options.id.png" loading="lazy" alt="Payments" srcset="assets/images/payment-options.id@2x.png 2x" class="img-fluid">
</div>
</div>
<div class="col-md">
<div class="mb-2">
<h6><div class="text-muted">Lebih Dekat dengan Kami</div></h6>
</div>
<ul class="social-media-list">
<li>
    <a href="https://instagram.com/centraldesign.id?igshid=YmMyMTA2M2Y=">
        <p><i class="fab fa-instagram"></i>&nbsp; <b>Instagram</b> &nbsp;&nbsp;&nbsp;: @haramainbakery</p>
      </a>
      <a href="https://api.whatsapp.com/send?phone=+6285205133314&text=Hay+CentralDesign.id+mau+tanya-tanya+donk%0ANama+:">
        <p><i class="fab fa-whatsapp"></i>&nbsp; <b>WhatsApp</b> &nbsp;&nbsp;&nbsp;:+6287744775444</p>
      </a>
</li>
</ul>
</div>
<div class="col-md">
<h6><div class="text-muted">Alamat</div></h6>
<ul class="list-unstyled">
    <a><p>  Kecamatan Narmada, Kabupaten Lombok Barat, <br>
            Provinsi Nusa Tenggara Barat - Indonesia<br>
            Kode POS : 83371</p></a>
</ul>
</div>
</div>
</div>
</div>
<div class="footer-bottom">
<div class="container text-center text-muted">
    <div class="copyright float-center">
    <script>
        document.write(new Date().getFullYear())
    </script>,&nbsp;<a target="_blank" href="" target="_blank"><b>Haramainbakery</b></a>.
    </div>
</div>
</div>
</footer>
<script src="js/6b3cb146008fcdc2ff1230ae72b6be93-1652473544.js"></script>
<script type="text/javascript">
	$('body').on('keyup', '#userSigninLogin', function(e) {
		if ($(this).val().length > 0) {
			$('#userSigninPasswordForm').collapse('show')
		} else {
			$('#userSigninPasswordForm').collapse('hide')
		}
	});
</script>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-auth.js"></script>
<script>
    const firebaseConfig = {
        apiKey: "AIzaSyAR3kJrVq1MO6TOqkPwG65dyufOR4g3XuQ",
        authDomain: "auth.wedew.id",
        databaseURL: "https://wedew-id.firebaseio.com",
        projectId: "wedew-id",
        storageBucket: "wedew-id.appspot.com",
        messagingSenderId: "808908963571",
        appId: "1:808908963571:web:72eabde1f7491f93478186",
        measurementId: "G-LJEGM40FJX"
    };

    firebase.initializeApp(firebaseConfig);

    function firebaseLogin(provider) {
        switch (provider) {
            case 'google':
                var provider = new firebase.auth.GoogleAuthProvider();
                break;
            case 'apple':
                var provider = new firebase.auth.OAuthProvider('apple.com');
                provider.addScope('email');
                provider.addScope('name');
                break;
            case 'facebook':
                var provider = new firebase.auth.FacebookAuthProvider();
                break;
            default:
                return;
        }

        var modal = bootbox.dialog({
            message: '<div class="text-center"><p><i class="fa fa-spin fa-spinner fa-4x"></i></p><p class="lead">Loading...</p></div>',
            size: 'small',
            onEscape: false,
            show: true,
        })

        if (firebase.auth().currentUser) {
            firebase.auth()
                .currentUser
                .linkWithPopup(provider)
                .then(firebaseSuccessCallback)
                .catch(firebaseErrorCallback);
        } else {
            firebase.auth()
                .signInWithPopup(provider)
                .then(firebaseSuccessCallback)
                .catch(firebaseErrorCallback);
        }
    }

    var firebaseSuccessCallback = function(result) {
        // modal.modal('hide')
        console.log(result)
        bootbox.alert('Berhasil. Sedang mengarahkan...')

        var credential = result.credential;

        $.request('firebaseAuth::onAuth', {
            data: {
                accessToken: credential.accessToken,
                idToken: credential.idToken,
                uid: result.user.uid,
            }
        })
    }

    var firebaseErrorCallback = function(error) {
        // modal.modal('hide')
        bootbox.alert('Gagal. ' + error.message + ' (' + error.code + ')')
    }
</script>
</body>
</html>