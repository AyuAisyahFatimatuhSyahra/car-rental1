<?php
declare(strict_types=1);
session_start();
require 'koneksi/koneksi.php';
include 'header.php';
if(empty($_SESSION['USER']))
{
    echo '<script>alert("Harap Login");window.location="index.php"</script>';
}
$hasil = $koneksi->query("SELECT mobil.merk, booking.* FROM booking JOIN mobil ON 
booking.id_mobil=mobil.id_mobil ORDER BY id_booking DESC")->fetchAll();
?>
<!-- Content Section -->
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-sm rounded">
                <div class="card-header text-white" style="background-color: #1D3557;">
                    <h4 class="mb-0">Daftar Transaksi</h4>
                </div>
                <div class="card-body" style="background-color: #F1FAEE;">
                    <table class="table table-striped table-bordered table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>Kode Booking</th>
                                <th>Merk Mobil</th>
                                <th>Nama</th>
                                <th>Tanggal Sewa</th>
                                <th>Lama Sewa</th>
                                <th>Total Harga</th>
                                <th>Konfirmasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($hasil as $isi) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $isi['kode_booking']; ?></td>
                                <td><?php echo $isi['merk']; ?></td>
                                <td><?php echo $isi['nama']; ?></td>
                                <td><?php echo $isi['tanggal']; ?></td>
                                <td><?php echo $isi['lama_sewa']; ?> hari</td>
                                <td>Rp. <?php echo number_format($isi['total_harga']); ?></td>
                                <td><?php echo $isi['konfirmasi_pembayaran']; ?></td>
                                <td>
                                    <a class="btn btn-success" href="bayar.php?id=<?php echo $isi['kode_booking']; ?>" role="button">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<?php include 'footer.php'; ?>