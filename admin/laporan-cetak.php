<?php
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
if (isset($_POST["kirim"]))
{
    $tgl_mulai = $_POST['tglm'];
    $tgl_selesai = $_POST['tgls'];
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON
        pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
    while($pecah = $ambil->fetch_assoc())
    {
        $semuadata[]=$pecah;
    }
}
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $total=0; ?>
        <?php foreach ($semuadata as $key => $value): ?>
        <?php $total+=$value['total_pembelian'] ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value["nama_pelanggan"] ?></td>
            <td><?php echo $value["tanggal_pembelian"] ?></td>
            <td>Rp. <?php echo number_format($value["total_pembelian"]) ?>,00</td>
            <td><?php echo $value["status_pembelian"] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th>Rp. <?php echo number_format($total) ?>,00</th>
            <th></th> 
        </tr>
    </tfoot>
</table>

<?php
//SIMPAN DIBARIS PALING BAWAH UNTUK KONVERSI PDF

    $content = ob_get_clean();
    require_once(dirname(__FILE__).'./html2pdf/html2pdf.class.php');
    try
    {
       $html2pdf = new HTML2PDF('P', 'A4', 'en',  array(8, 8, 8, 8));
       $html2pdf->pdf->SetDisplayMode('fullpage');
       $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
       $html2pdf->Output('laporan.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>
