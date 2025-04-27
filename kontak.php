<?php
declare(strict_types=1);
session_start();
require 'koneksi/koneksi.php';
include 'header.php';
?>

<!-- Contact Us Page -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center" style="color: #1D3557;">Kontak Kami</h3>
            <p class="text-center">Jika Anda memiliki pertanyaan atau membutuhkan bantuan, silakan hubungi kami melalui WhatsApp di bawah ini.</p>
            
            <!-- WhatsApp Button -->
            <div class="text-center">
                <a href="https://wa.me/6281217161884?text=Halo,%20saya%20ingin%20menghubungi%20untuk%20mendapatkan%20informasi." 
                   target="_blank" 
                   class="btn btn-success btn-lg" 
                   style="background-color: #25D366; border-color: #25D366;">
                    <i class="fa fa-whatsapp"></i> Hubungi Kami via WhatsApp
                </a>
            </div>

            <hr>

            <!-- Contact Form (Email via Gmail) -->
            <div class="card shadow-sm rounded mt-4">
                <div class="card-body" style="background-color: #F1FAEE;">
                    <h5>Atau kirimkan pesan langsung melalui email:</h5>
                    <p class="text-center">Klik tombol di bawah untuk mengirimkan email ke kami:</p>
                    <div class="text-center">
                        <a href="mailto:ayuaisyahfz@gmail.com?subject=Pertanyaan%20tentang%20Rental%20Mobil&body=Halo%2C%20saya%20ingin%20bertanya%20tentang%20rental%20mobil." 
                           class="btn btn-primary btn-lg" 
                           style="background-color: #007BFF; border: none;">
                            <i class="fa fa-envelope"></i> Kirim Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>