<?php
$nama = $_POST['nama'];
$to = $_POST['email'];
$subject = $_POST['subject'];
$messages = $_POST['messages'];
    
$headers = "From: zamzami.albakrie@gmail.com" ."\r\n". 
"CC: mayariatinmaini@gmail.com"; //bagian ini diganti sesuai dengan email dari pengirim
@mail($to,$subject,$messages,$headers);

echo "<script>alert('Pesan Terkirim');</script>";
echo "<script>location='index.php?halaman=contact-us';</script>";
?>