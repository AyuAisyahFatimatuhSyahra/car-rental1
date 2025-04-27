<?php
declare(strict_types=1);
/*
  | Source Code Cetak Laporan Booking
  | Untuk Aplikasi Rental Mobil
*/

session_start();
require '../../koneksi/koneksi.php';
include '../header.php';

if(empty($_SESSION['USER']))
{
    echo '<script>alert("Harap login terlebih dahulu!");window.location="index.php"</script>';
}

// Ambil data booking
$query = $koneksi->query("SELECT * FROM booking ORDER BY tgl_input DESC");
?>

<br><br>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Laporan Data Booking</h3>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Booking</th>
                        <th>Nama</th>
                        <th>KTP</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Tanggal Sewa</th>
                        <th>Lama Sewa</th>
                        <th>Total Harga</th>
                        <th>Konfirmasi Pembayaran</th>
                        <th>Tanggal Input</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?php echo  $no++; ?></td>
                            <td><?php echo  htmlspecialchars($data['kode_booking']); ?></td>
                            <td><?php echo  htmlspecialchars($data['nama']); ?></td>
                            <td><?php echo  htmlspecialchars($data['ktp']); ?></td>
                            <td><?php echo  htmlspecialchars($data['alamat']); ?></td>
                            <td><?php echo  htmlspecialchars($data['no_tlp']); ?></td>
                            <td><?php echo  htmlspecialchars($data['tanggal']); ?></td>
                            <td><?php echo  htmlspecialchars($data['lama_sewa']); ?> hari</td>
                            <td>Rp <?php echo  number_format($data['total_harga'], 0, ',', '.'); ?></td>
                            <td><?php echo  htmlspecialchars($data['konfirmasi_pembayaran']); ?></td>
                            <td><?php echo  htmlspecialchars($data['tgl_input']); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

            <button onclick="window.print()" class="btn btn-primary mt-3">Cetak Laporan</button>
        </div>
    </div>
</div>

<br><br><br>

<?php include 'footer.php';?>
