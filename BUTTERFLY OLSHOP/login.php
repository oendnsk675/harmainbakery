<?php
session_start();
include 'admin/koneksi.php';
?>
	<!DOCTYPE html>
	<html>
	<head>
	<title>login pelanggan</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css"> 

</head>
	<body>

<!-- navbar -->
<?php include 'menu.php'; ?>
	<div class="container">
		<div class="row"><br><br><br><br><br>
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						
					<h3 class="panel-title">Login Pelanggan</h3>
				
				<div class="panel-body">
					<form method="post">
						<label>Email</label>
						<input type="email" class="form-control" name="email">
					
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<button class="btn btn-primary" name="login">Login</button>
				</form>

					</div>
				</div>
			</div>
		</div>
	</div>
		
<?php
// jk ada tombol login (tombol login ditekan)
if (isset($_POST["login"]))
{
	$email = $_POST["email"];
	$password = $_POST["password"];
	// lakukan kuery ngecek akun di tabel pelanggan di db
	$ambil = $koneksi->query("SELECT * FROM pelanggan
		WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

		// ngitung akun yang terambil
		$akunyangcocok = $ambil->num_rows;

		// jika 1 akun yang cocok, maka diloginkan
		if ($akunyangcocok==1)
		{
			//anda sukses login
			// mendapatkan akun dlm bentuk array
			$akun = $ambil->fetch_assoc();
			// simpan di session pelanggan
			$_SESSION["pelanggan"] = $akun;
			echo "<script>alert('anda sukses login');</script>";

			// jk sudah belanja
			if(isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
			{
				echo "<script>location='checkout.php';</script>";
			}
			else
			{
				echo "<script>location='riwayat.php';</script>" ;
			}

			// anda gagal login
			echo "<script>alert('anda gagal login, periksa akun Anda');</script>";
			echo "<script>location='login.php';</script>";
		}
	}
		?>
			</div>
		</body>
	<html> 