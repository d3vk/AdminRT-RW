<?php

/* @var $this yii\web\View */

$this->title = 'AdministrasiRT-RW';
?>

<style>
    body {
        background-image: url("/borobudur.jpg");
    }
</style>

<div class="site-index" style="background-image: url('/borobudur.jpg');">

    <div class="jumbotron">
        <h1>Selamat Datang!</h1>

        <p class="lead">Portal Administrasi RT/RW Semarang</p>

        <p><a class="btn btn-success" href="index.php?r=site%2Flogin">Masuk sebagai pengguna</a></p>
    </div>

    <div class="body-content">

        <!-- <div class="row">
            <div class="col-lg-4">
                <h2>Buat KK Baru</h2>

                <p style="text-align:justify;">Anda dapat membuat Kartu Keluarga baru melalui portal ini dengan cara menghubungi admin secara langsung.</p>

                <p><a class="btn btn-default" href="#">Buat KK &raquo;</a></p>
            </div> -->

        <div class="col-lg-6">
            <h2>Cek Tagihan</h2>

            <p style="text-align:justify;">
                Sekarang kamu bisa mengecek tagihan bulanan kamu melalui website AdminRT-RW. Kamu tinggal melakukan login dan pilih menu "Cek Tagihan", lalu AdminRT-RW akan menampilkan jumlah tagihan kamu. Setelah selesai melakukan pengecekan, kamu bisa langsung bayar tagihan bulanan kamu melalui Bendahara RT.
            </p>

            <p><a class=" btn btn-default" href="index.php?r=site%2Fview-tax">Cek Tagihan &raquo;</a></p>
        </div>

        <div class="col-lg-6">
            <h2>Ajukan Mutasi</h2>

            <p style="text-align:justify;">
                Mutasi Kartu Keluarga semakin mudah tanpa proses berkepanjangan. Tinggal ajukan saja melalui AdminRT-RW dan akan langsung dilaporkan ke disdukcapil setempat. Anda tidak perlu membawa apapun, cukup klik-klik, selesai. Tunggu update dari disdukcapil.
            </p>

            <p><a class="btn btn-default" href="index.php?r=site%2Freq-mutasi">Request Mutasi &raquo;</a></p>
        </div>
    </div>

</div>
</div>