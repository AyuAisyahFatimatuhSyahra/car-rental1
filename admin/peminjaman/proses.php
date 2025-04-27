<?php
declare(strict_types=1);
require '../../koneksi/koneksi.php';

if ($_GET['id'] == 'konfirmasi') {
    $data2[] = $_POST['status'];  // New status selected by the user
    $data2[] = $_POST['id_mobil'];  // The car ID
    $sql2 = "UPDATE `mobil` SET `status`= ? WHERE id_mobil= ?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    echo '<script>alert("Status Mobil telah diperbarui");history.go(-1);</script>';
}