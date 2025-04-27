<?php
declare(strict_types=1);
require 'koneksi/koneksi.php';
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (empty($_SESSION['USER'])) { }
include 'header.php';
?>

<!-- Main Content Section -->
<div class="container-fluid" style="min-height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="row justify-content-center w-100">
        <!-- Login Form Section -->
        <div class="col-md-4 col-sm-6 col-10">
            <div class="card shadow-lg rounded">
                <div class="card-header" style="background-color: #1D3557; color: white;">
                    <h5 class="text-center">Login</h5>
                </div>
                <div class="card-body" style="background-color: #F1FAEE;">
                    <form method="post" action="koneksi/proses.php?id=login">
                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" class="form-control" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p>Don't have an account?</p>
                        <a href="register.php" class="btn btn-danger">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Only show the following content if the user is logged in
if (!empty($_SESSION['USER'])) {
?>

<!-- Carousel Section (visible after login) -->
<div id="carouselId" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php 
            $querymobil =  $koneksi->query('SELECT * FROM mobil ORDER BY id_mobil DESC')->fetchAll();
            $no = 1;
            foreach($querymobil as $isi) {
        ?>
        <li data-target="#carouselId" data-slide-to="<?php echo $no;?>" class="<?php if($no == '1'){ echo 'active';}?>"></li>
        <?php $no++; } ?>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php 
            $no = 1;
            foreach($querymobil as $isi) {
        ?>
        <div class="carousel-item <?php if($no == '1'){ echo 'active';}?>">
            <img src="assets/image/<?php echo $isi['gambar'];?>" alt="First slide" class="img-fluid" style="object-fit:cover;width:100%;height:500px;">
        </div>
        <?php $no++; } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Main Products Section (visible after login) -->
<div class="container-fluid mt-5">
    <div class="row">
        <?php 
            $query =  $koneksi->query('SELECT * FROM mobil ORDER BY id_mobil DESC')->fetchAll();
            foreach($query as $isi) {
        ?>
        <div class="col-sm-4 mb-4">
            <div class="card">
                <img src="assets/image/<?php echo $isi['gambar'];?>" class="card-img-top" style="height:200px; object-fit: cover;">
                <div class="card-body" style="background:#F1FAEE;">
                    <h5 class="card-title"><?php echo $isi['merk'];?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <?php if($isi['status'] == 'Tersedia'){ ?>
                    <li class="list-group-item bg-success text-white">
                        <i class="fa fa-check"></i> Available
                    </li>
                    <?php } else { ?>
                    <li class="list-group-item bg-danger text-white">
                        <i class="fa fa-close"></i> Not Available
                    </li>
                    <?php }?>
                    <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> Free E-toll 50k</li>
                    <li class="list-group-item bg-dark text-white"><i class="fa fa-money"></i> Rp. <?php echo number_format($isi['harga']);?>/ day</li>
                </ul>
                <div class="card-body">
                    <center>
                        <a href="booking.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-primary">Book Now</a>
                        <a href="detail.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-secondary">Details</a>
                    </center>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>

<?php } // End check for logged-in user ?>

<!-- Modal for Registration -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1D3557; color: white;">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="koneksi/proses.php?id=daftar">
                    <div class="form-group">
                        <label for="nama">Full Name</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" name="user" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>