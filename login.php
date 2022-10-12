<?php
session_start();
$koneksi = new mysqli("localhost","root","","haramainbakery");

?>
<!DOCTYPE html>
<html lang="en">
<body>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="post">
							<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="E-Mail" />
							</div>
							<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" />
							</div>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button class="btn btn-default" name="login">Login</button>
						</form>

						<?php
						if (isset($_POST['login']))
						{
							$email = $_POST["email"];
							$password = $_POST["password"];
							$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'
							AND password_pelanggan ='$password'");
							$akunyangcocok = $ambil->num_rows;
							if ($akunyangcocok==1)
		
							{
								$akun = $ambil->fetch_assoc();
								$_SESSION["pelanggan"] = $akun;
								echo "<script>alert('Login Sukses');</script>";
								echo "<script>location='index.php?halaman=checkout';</script>";
							}
							else
							{
								echo "<script>alert('Login Gagal');</script>";
								echo "<script>location='index.php?halaman=login';</script>";
							}
						}
						?>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="post" enctype="multipart/form-data">
							<input class="form-control" type="text" name="nama_pelanggan" placeholder="Name"/>
							<input class="form-control" type="email" name="email_pelanggan" placeholder="Email Address"/>
							<input class="form-control" type="password" name="pass" placeholder="Password"/>
							<input class="form-control" type="text" name="hp" placeholder="No. Handphone"/>
							<button class="btn btn-default" name="daftar">Signup</button>
						</form>
						<?php
						if (isset($_POST['daftar']))
						{
							$koneksi->query("INSERT INTO pelanggan
							(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan)
							VALUES('$_POST[email_pelanggan]','$_POST[pass]','$_POST[nama_pelanggan]','$_POST[hp]')");
		
							
								echo "<div class='alert alert-info'>Data Tersimpan</div>";
								echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=login'>";
						}
						?>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
</body>
</html>