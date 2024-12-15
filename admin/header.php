<?php 
session_start();
include '../assets/conn/cek.php';
include '../assets/conn/config.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Sistem Pendukung Keputusan</title>
    <meta charset="utf-8">
    <style>
    /* CSS untuk mengubah warna latar belakang kolom menjadi kuning */
    .kuning {
        background-color: yellow;
    }

    .abu-abu {
        background-color: #D3D3D3;
        /* Gunakan kode warna abu-abu */
    }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../assets/desain-home/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css"
        href="../assets/desain-home/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/desain-home/css/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="index.php" class="img logo mb-5"
                    style="background-image: url(../assets/desain-home/images/logo1.png); background-size: 100%;"></a>
                <ul class="list-unstyled components mb-5">

                    <li>
                        <a href="index.php"><i class="fas fa-house"></i>&emsp; Home</a>
                    </li>

                    <li>
                        <a href="alternatif.php"><i class="fa-solid fa-layer-group"></i>
                            &emsp;Alternatif</a>
                    </li>
                    <li>
                        <a href="kriteria.php"><i class="fas fa-list-ul"></i>&emsp; Kriteria</a>
                    </li>
                    <li>
                        <a href="nilai.php"><i class="fas fa-pencil"></i>&emsp; Nilai</a>
                    </li>
                    <li>
                        <a href="metode.php"><i class="fas fa-retweet"></i>&emsp;Metode</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fas fa-right-from-bracket"></i>&emsp;Logout</a>
                    </li>

                </ul>
                <ul class="list-unstyled components mb-5">
                    <li><i class="fa-solid fa-face-grin-hearts"></i>&emsp;Create By Ridofas Tri Sandi Fantiantoro</li>
                </ul>


            </div>

        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>


                </div>
            </nav>



            <script src="../assets/desain-home/js/jquery.min.js"></script>
            <script src="../assets/desain-home/js/popper.js"></script>
            <script src="../assets/desain-home/js/bootstrap.min.js"></script>
            <script src="../assets/desain-home/js/main.js"></script>
</body>

</html>