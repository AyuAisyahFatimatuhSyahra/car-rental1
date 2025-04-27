<?php
declare(strict_types=1);
require '../../koneksi/koneksi.php';
$title_web = 'Cetak Booking';
include '../header.php';

if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (empty($_SESSION['USER'])) { }

// Query semua data booking
$sql = "SELECT mobil.merk, booking.* FROM booking JOIN mobil ON booking.id_mobil = mobil.id_mobil ORDER BY id_booking DESC";
$hasil = $koneksi->query($sql)->fetchAll();
?>

<br>
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h5 class="card-title">
            Data Booking Mobil
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Booking</th>
                            <th>Merk Mobil</th>
                            <th>Nama</th>
                            <th>Tanggal Sewa</th>
                            <th>Lama Sewa</th>
                            <th>Total Harga</th>
                            <th>Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($hasil as $isi) { ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo  $isi['kode_booking']; ?></td>
                            <td><?php echo  $isi['merk']; ?></td>
                            <td><?php echo  $isi['nama']; ?></td>
                            <td><?php echo  $isi['tanggal']; ?></td>
                            <td><?php echo  $isi['lama_sewa']; ?> hari</td>
                            <td>Rp. <?php echo  number_format($isi['total_harga']); ?></td>
                            <td><?php echo  $isi['konfirmasi_pembayaran']; ?></td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
            <br>
            <button class="btn btn-success" onclick="window.print();">
                <i class="fa fa-print"></i> Print Sekarang
            </button>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>