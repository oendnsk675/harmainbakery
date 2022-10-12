<?php
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

function send_email($title, $subject, $to, $username){
    global $mail;
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'ssl://srv91.niagahoster.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'no-reply@bajaga.online';                     //SMTP username
    $mail->Password   = 'bajagadotonline';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 465;
    //pengirim
    $mail->setFrom('no-reply@bajaga.online', $title);
    $mail->addAddress($to);     //Add a recipient
 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    // $username = $username;
    ob_start();
    include('./email_template.php');
    $body = ob_get_contents();
    ob_clean();

    $mail->Body = $body;

    $mail->send();
    return true;
}



$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan INNER JOIN pembelian_produk ON pembelian_produk.id_pembelian=pembelian.id_pembelian
    WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
// var_dump($detail); 
// die();
?>

<main class="c-main">
    <div class="container-fluid ">
    <div class="container mt-3">
    <div class="row justify-content-center">
    <div class="col-xl-12">
    <div class="card">
    <div class="card-body">
        <h1>Detail Pembelian</h1>
        <hr>
        Nama Pemesan &nbsp; : &nbsp; <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
        <p>
        No. Telpon &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; <?php echo $detail['telepon_pelanggan']; ?> <br>
        E-Mail &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;<?php echo $detail['email_pelanggan']; ?>
        </p>
        <p class="text-right">
        Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
        </p>
    </div>

    <div class="card-body p-0" style="min-height: 300px">
    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
        <th>No.</th>
        <th width="20%">Nama Produk</th>
        <th>Bukti Pembayaran</th>
        <th>Status Pembelian</th>
        <th class="text-right">Total</th>
        <th class="text-center">Aksi</th>
        </tr>
        </thead>
    <tbody>
    <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk"); ?>
    <?php $pecah = $ambil->fetch_assoc(); { ?>
        <tr class="invoice-status-paid" style="transform: rotate(0);">
            <td class="text-nowrap">
                <div class="text-warning"><strong>Invoice-<?php echo $detail['id_pembelian']; ?></strong></div>
            </td>
            <td class="text-nowrap">
                <strong><?php echo $pecah['nama_produk']; ?></strong>
            </td>
            <td class="text-nowrap">
                <strong><a href="../bukti_pembayaran/<?php echo $detail['bukti']; ?>" target="_blank">Lihat detail</a></strong>
            </td>
            <td class="text-nowrap">
                <strong><?php echo $detail['status_pembelian']; ?></strong>
            </td>
            <td class="total text-right text-nowrap">
                <strong>Rp. <?php echo $detail['total_pembelian']; ?></strong></td>
            <td class="text-left" style="display: flex; flex-direction: column; gap: 2px;">
                <a href="dashboard.php?halaman=detailpembelian&id=<?php echo $detail['id_pembelian_produk']; ?>" class="btn btn-warning text-white">Lihat Invoice</a>
                <form method="POST">
                    <button type="submit" class="btn btn-success text-white" style="width: 100%;" name="konfirmasi">Konfirmasi</button>
                </form>
            </td>
            <?php 

            if (isset($_POST['konfirmasi'])) {
                $id_pem = $_GET['id'];
                $koneksi->query("UPDATE pembelian SET status_pembelian = 'Dikonfirmasi' WHERE id_pembelian = '$id_pem'"); 
                send_email("Haramain Bakery", "Order Konfirmasi", $detail['email_pelanggan'], $detail['nama_pelanggan']);
                echo "<script>alert('Berhasil konfirmasi pembayaran!')</script>";
                
                echo "<script>location.href = 'dashboard.php?halaman=detail&id=$id_pem'</script>";
            }
            
            ?>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</main>